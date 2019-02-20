<?php
/**
 * Created by PhpStorm.
 * User : daimajie
 * Email: daimajie@qq.com
 * Date : 2019/2/20
 * Time : 13:43
 */

namespace app\modules\home\modules\content\controllers;


use app\models\content\Article;
use app\modules\home\controllers\BaseController;

class ArticleController extends BaseController
{
    //显示文章
    public function actionView($id){

        $model = $this->findModel($id);

        return $this->render('view',[
            'model' => $model,
            'prevAndNext' => Article::getPrevNext($id, $model['topic_id'])
        ]);
    }


    /**
     * 获取制定文章模型
     */
    protected function findModel($id)
    {
        if (($model = Article::singleArticle($id)) !== null) {

            return $model;

        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}