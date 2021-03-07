<?php
 class GetCountValue 
{
	//TODO::GETING DYNAMICALLY COUNT VALUE
		public function getCount($data){
			$arrayData= explode("+",$data);
			return count($arrayData);	
		}
		public function getTotalAmt($value){
				$arrayData= explode("+",$value);
				foreach ($arrayData as $value) {
  					$value +=$value ;
				}
		}
}
?>