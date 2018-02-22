<?php

namespace app\controllers;

use app\models\WaybillRepository;
use app\services\WayBillService;
use Yii;
use app\models\Waybill;
use app\models\WaybillSearch;
use yii\base\Module;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WaybillController implements the CRUD actions for Waybill model.
 */
class WaybillController extends Controller
{
    /**
     * @var WaybillRepository
     */
    private $waybillRepository;
    /**
     * @var WayBillService
     */
    private $wayBillService;

    /**
     * WaybillController constructor.
     * @param string $id
     * @param Module $module
     * @param WaybillRepository $waybillRepository
     * @param WayBillService $wayBillService
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        WaybillRepository $waybillRepository,
        WayBillService $wayBillService,
        array $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->waybillRepository = $waybillRepository;
        $this->wayBillService = $wayBillService;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Waybill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WaybillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Waybill model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Waybill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $type = $this->wayBillService->createType();

        if ($type->load(Yii::$app->request->post()) && $type->validate()) {
            $model = $this->wayBillService->create($type);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'type' => $type,
        ]);
    }

    /**
     * Updates an existing Waybill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        $type = $this->wayBillService->createType($model);

        if ($type->load(Yii::$app->request->post()) && $type->validate()) {
            $model = $this->wayBillService->update($id, $type);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'type' => $type,
        ]);
    }

    /**
     * Deletes an existing Waybill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->wayBillService->delete($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Waybill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Waybill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = $this->waybillRepository->findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
