<?php

namespace app\controllers;

use app\models\CalculatorForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\StudentForm;
use app\models\UploadImageForm;
use yii\web\UploadedFile;
use app\models\MyUsers;
use yii\data\Pagination;
use yii\data\Sort;
use app\components\Taxi;





class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $email = "ksminu24@gmail.com";
        $phone = "+919846296704";
        return $this->render('about',[
           'email' => $email,
           'phone' => $phone
        ]);
        
        
       
    }


    public function actionSpeak($message = "default message") { 
        return $this->render("speak",['message' => $message]); 
     } 
 
     

     public function actionStudent()
     {
         $model = new StudentForm();
 
         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             if ($model->register()) {
                 Yii::$app->session->setFlash('success', 'Registration successful.');
                 return $this->goHome();
             } else {
                 Yii::$app->session->setFlash('error', 'Failed to register student.');
             }
         }
 
         return $this->render('student', [
             'model' => $model,
         ]);
     }

     

   
     
     public function actionCalculator()
     {
         $model = new CalculatorForm();
         $result = null; // Initialize $result variable
         
         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             $number1 = $model->number1;
             $number2 = $model->number2;
             $operation = Yii::$app->request->post('operation');
     
             switch ($operation) {
                 case 'add':
                     $result = $number1 + $number2;
                     break;
     
                 case 'sub':
                     $result = $number1 - $number2;
                     break;
     
                 case 'mul':
                     $result = $number1 * $number2;
                     break;
     
                 case 'div':
                     if ($number2 != 0) {
                         $result = $number1 / $number2;
                     } else {
                         $result = 'divide by zero error';
                     }
                     break;
     
                 default:
                     $result = "invalid";
                     break;
             }
         }
     
         // Pass $result to the view through the model
         $model->result = $result;
     
         // Render the view, passing the model and $result
         return $this->render('calculator', [
             'model' => $model,
             'result' => $result,
         ]);
     }

     
     public function actionTestWidget() { 
        return $this->render('testwidget'); 
     }



     public function actionOpenAndCloseSession() {
        $session = Yii::$app->session;
        // open a session
        $session->open();
        // check if a session is already opened
        if ($session->isActive) echo "session is active";
        // close a session
        $session->close();
        // destroys all data registered to a session
        $session->destroy();
     }


     public function actionAccessSession() {

        $session = Yii::$app->session;
         
        // set a session variable
        $session->set('language', 'ru-RU');
         
        // get a session variable
        $language = $session->get('language');
        var_dump($language);
               
        // remove a session variable
        $session->remove('language');
               
        // check if a session variable exists
        if (!$session->has('language')) echo "language is not set";

//without set and get
        //$session['language']=['language'=>'ru-RU',];
        //($session['language']);  
        

        $session['captcha'] = [
           'value' => 'aSBS23',
           'lifetime' => 7200,
        ];
        var_dump($session['captcha']);
     }


     public function actionShowFlash() {
        $session = Yii::$app->session;
        // set a flash message named as "greeting"
        $session->setFlash('greeting', 'Hello user!');
        return $this->render('showflash');
     }

//http get method
     //public function actionTestGet() {
     //   var_dump(Yii::$app->request->get());
    // }



    /*public function actionTestGet() {
        $req = Yii::$app->request;
        if ($req->isAjax) {
           echo "the request is AJAX";
        }
        if ($req->isGet) {
           echo "the request is GET";
        }
        if ($req->isPost) {
           echo "the request is POST";
        }
        if ($req->isPut) {
           echo "the request is PUT";
        }
     }*/


     public function actionTestGet() {
        //the URL without the host
        var_dump(Yii::$app->request->url);
        
        //the whole URL including the host path
        var_dump(Yii::$app->request->absoluteUrl);
        
        //the host of the URL
        var_dump(Yii::$app->request->hostInfo);
        
        //the part after the entry script and before the question mark
        var_dump(Yii::$app->request->pathInfo);
        
        //the part after the question mark
        var_dump(Yii::$app->request->queryString);
        
        //the part after the host and before the entry script
        var_dump(Yii::$app->request->baseUrl);
        
        //the URL without path info and query string
        var_dump(Yii::$app->request->scriptUrl);
        
        //the host name in the URL
        var_dump(Yii::$app->request->serverName);
        
        //the port used by the web server
        var_dump(Yii::$app->request->serverPort);
     }


     public function actionTestResponse() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
           'id' => '1',
           'name' => 'Ivan',
           'age' => 24,
           'country' => 'Poland',
           'city' => 'Warsaw'
        ];
     }



     public function actionUploadImage() {
        $model = new UploadImageForm();
        if (Yii::$app->request->isPost) {
           $model->image = UploadedFile::getInstance($model, 'image');
           if ($model->upload()) {
              // file is uploaded successfully
              echo "File successfully uploaded";
              return;
           }
        }
        return $this->render('upload', ['model' => $model]);
     }



     public function actionPagination() {
        //preparing the query
        $query = MyUsers::find();
        // get the total number of users
        $count = $query->count();
        //creating the pagination object
        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 10]);
        //limit the query using the pagination and retrieve the users
        $models = $query->offset($pagination->offset)
           ->limit($pagination->limit)
           ->all();
        return $this->render('pagination', [
           'models' => $models,
           'pagination' => $pagination,
        ]);
     }



     public function actionSorting() {
        //declaring the sort object
        $sort = new Sort([
           'attributes' => ['id', 'name', 'email'], 
        ]);
        //retrieving all users
        $models = MyUsers::find()
           ->orderBy($sort->orders)
           ->all();
        return $this->render('sorting', [
           'models' => $models,
           'sort' => $sort,
        ]);
     }

//code for query builder
    /* public function actionTestDb() {
        //generates "SELECT id, name, email FROM user WHERE name = 'User10';"
        $user = (new \yii\db\Query())
           ->select(['id', 'name', 'email'])
           ->from('users')
           //->where(['name' => 'liya'])
          // ->where(['between', 'id', 2, 5])
          //->orderBy('name DESC')
          ->limit(2)
          ->offset(1)
           ->all();
        var_dump($user);
     }*/
     public function actionTestDb() {
        // returns a single customer whose ID is 1
        // SELECT * FROM `user` WHERE `id` = 1
        $user = MyUsers::findOne(1);
        var_dump($user);
        // returns customers whose ID is 1,2,3, or 4
        // SELECT * FROM `user` WHERE `id` IN (1,2,3,4)
        $users = MyUsers::findAll([1, 2, 3]);
        var_dump($users);
        // returns a user whose ID is 5
        // SELECT * FROM `user` WHERE `id` = 5
        $user = MyUsers::findOne([
           'id' => 5
        ]);
        var_dump($user);
     }
     


     public function actionFormatter(){
        return $this->render('formatter');
     }

     public function actionProperties() {
        $object = new Taxi();
        // equivalent to $phone = $object->getPhone();
        $phone = $object->phone;
        var_dump($phone);
        // equivalent to $object->setLabel('abc');
        $object->phone = '79005448877';
        var_dump($object);
     }

     public function actionTranslation() {
        echo \Yii::t('app', 'This is a string to translate!');
     }
}


