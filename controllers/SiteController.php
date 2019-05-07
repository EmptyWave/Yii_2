<?php

namespace app\controllers;

use app\models\RegistrationForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\tables\Task;
use app\models\filters\TasksFilter;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{

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

    public function actionIndex()
    {
        $searchModel = new TasksFilter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $monthList = Task::getCreateMonthList();
        $newMonthList[] = NULL;
        /*$newMonthList = array_map(
            function ($date){
                return date('m Y', strtotime($date));
                },
            $monthList
        );*/
        foreach ($monthList as $key => $date){
            $monthNum = date('m', strtotime($date));
            $yearNum = date('Y', strtotime($date));
            $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
            $newDate = $monthName.' '.$yearNum;
            if (!in_array($newDate,$newMonthList)){
                $newKey = $yearNum.'-'.$monthNum.'[\d\W]*';
                $newMonthList[$newKey] = $newDate;
            }
        }
      /*$dataProvider = new ActiveDataProvider([
        'query' => Task::find()
      ]);*/
      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'monthList' => $newMonthList,
      ]);
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

  public function actionRegistration()
  {
    $model = new RegistrationForm();
    return $this->render('registration', [
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

    public function actionAbout()
    {
        return $this->render('about');
    }
}
