<?php

namespace common\modules\hello\controllers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * SiteController implements the CRUD actions for Site model.
 */
class SiteController extends Controller
{
    public $page;
    public $playlist;
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Site models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $queryParams = $this->request->queryParams;

        $say = "Hello, " . $queryParams["name"] . "!";

        //echo $say . "<br>";

        /*
        return $this->render('index', [
            'say' => $say,
        ]);
        */
        return $this->redirect(['site/say', 'say' => $say]);
    }

    /**
     * Lists all Site models.
     *
     * @return string
     */
    public function actionSay()
    {
        $queryParams = $this->request->queryParams;

        echo "SayController: <br>";

        echo $queryParams["say"] . "<br>";

    }
}