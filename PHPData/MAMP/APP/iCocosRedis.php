<?php

	$redis = new Redis();
	$redis->connect('127.0.0.1', 6379);

	$redis->set('iCocos',1234);

	$redis->get('iCocos');