
http://com.yiibasicesd.www:8888/index.php?r=site/index

http://com.yiibasicesd.www:8888/index.php?r=home/index

actionIndex -> index


http://com.yiibasicesd.www:8888/index.php?r=home/index&id=10001

	    $request = \Yii::$app->request;
	    echo $request->get('id');