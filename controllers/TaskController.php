<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\tables\Task;
use app\models\tables\Users;

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
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  public function actionIndex(){

    return $this->render('index');

  }

  public function actionView(){
    $request = Yii::$app->request;
    if ($request->isGet){
      $get = $request->get('id');
      $model = Task::findOne(['id' => $get]);
      //$taskData['creatorName'] = Users::findOne(['id' => $taskData['creator_id']])->username;
      //$taskData['responsibleName'] = Users::findOne(['id' => $taskData['responsible_id']])->username;

      return $this->render('view', [
        'model' => $model,
      ]);
    }
    return $this->goHome();
  }
  public function actionEdit(){

    return $this->render('edit',['title' => 'Editor',]);
  }
  public function actionActive(){

    return $this->render('active',['title' => 'Active',]);
  }
  public function actionAbout(){

    return $this->render('about',['title' => 'About',]);
  }

  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }

    $model->password = '';
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }

  public function actionContact()
  {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
      Yii::$app->session->setFlash('contactFormSubmitted');

      return $this->refresh();
    }
    return $this->render('contact', [
      'model' => $model,
    ]);
  }
}