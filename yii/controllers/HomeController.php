<?php

namespace app\controllers;

use \yii\base\Controller;

/**
* 
*/
class HomeController extends Controller
{
	public function actionIndex() {
	    $data = [
	        'name' => 'iCocos',
            'lover' => 'PHP',
        ];
//	    P($data);

//	    $request = \Yii::$app->request;
//	    echo $request->get('id', 1); //get

        //$name = 'iCocosName'; //['name'=>$name]
	    return $this->renderPartial('home', $data);
	}
}