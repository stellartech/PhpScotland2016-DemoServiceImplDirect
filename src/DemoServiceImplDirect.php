<?php

namespace PhpScotland2016\Demo\Service\Impl\Direct;

use PhpScotland2016\Demo\Service\Interfaces\DemoServiceRequest;
use PhpScotland2016\Demo\Service\Interfaces\DemoServiceResponse;
use PhpScotland2016\Demo\Service\Interfaces\DemoServiceInterface;

class DemoServiceImplDirect implements DemoServiceInterface
{
	public function handleRequest(DemoServiceRequest $request) {
		$wait_for = $request->getParam("wait_for", 10);
		if(is_numeric($wait_for)) {
			$wait_for = (int)$wait_for;
			if($wait_for > 10) {
				$wait_for = 10;
			}
			
		}
		sleep($wait_for);
		$message = $request->getAsArray();
		$message['result'] = 0;
		$message['hostname'] = gethostname();
		return new DemoServiceResponse($message);
	}
}

