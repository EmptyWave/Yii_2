<?php

namespace app\controllers;

use Yii;
use app\models\tables\TaskStatuses;
use yii\caching\DbDependency;
use yii\base\Event;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\tables\Task;
use app\models\tables\Users;
use yii\helpers\Url;

class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');

    }

    public function actionView()
    {
        $get = Yii::$app->request->get('id');

        if ($get) {

            //$get = $request->get('id');
            $cache = Yii::$app->cache;
            $key = 'Task_'.$get;

            if (!$model = $cache->get($key)){
                $dependency = new DbDependency();
                $dependency->sql = 'SELECT MAX(modified) FROM `task`';

                $model = $this->findModel($get);
                $cache->set($key, $model, 300,$dependency);
            }

            return $this->render('view', [
                'model' => $model,
            ]);
        }
        return $this->goHome();
    }

    public function actionCreate()
    {
        $model = new Task();

        $model->on(Task::EVENT_AFTER_INSERT, function ($event) {
            $task = $event->sender;
            $user = $task->responsible;
            $id = $task->id;

            $body = "Назначена новая задача ($task->name).
        Ссылка на задачу - " . Url::toRoute(['task/view', 'id' => $task->id], true);

            \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom('admin@gmail.com')
                ->setSubject("Новая задача - " . $task->name)
                ->setTextBody($body)
                ->send();
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $usersList = Users::getUsersList();
        $statusList = TaskStatuses::getStatusList();


        return $this->render('create', [
            'model' => $model,
            'usersList' => $usersList,
            'statusList' => $statusList,
        ]);
    }

    public function actionEdit($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $usersList = USers::getUsersList();
        $statusList = TaskStatuses::getStatusList();

        return $this->render('edit', [
            'model' => $model,
            'usersList' => $usersList,
            'statusList' => $statusList,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->goHome();
    }

    public function actionActive()
    {
        if (!Yii::$app->user->isGuest) {
            $id = Yii::$app->user->identity->getId();
            $dataProvider = new ActiveDataProvider([
                'query' => Task::find()
                    ->where(['responsible_id' => $id])
            ]);
        }
        return $this->render('active', [
            'title' => 'Active Tasks',
            'dataProvider' => $dataProvider
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        return Null;
    }

    protected function sentTaskMail($event)
    {
        $task = $event->sender;
        $user = $task->responsible;

        $body = "Назначена новая задача ($task->name).
      Ссылка на задачу - " . Url::to(['task/view', 'id' => $task->id]);

        \Yii::$app->mailer->compose()
            ->setTo($user->email)
            ->setFrom('admin@gmail.com')
            ->setSubject("Новая задача ($task->name)")
            ->setTextBody($body)
            ->send();
    }
}