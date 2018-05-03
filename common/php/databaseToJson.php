<?php

class toJava{

	function buildObject($tableName,$tableValues,$dimmension2){

		$javaObject='['; //start array wrap
		$valuesAmount=count($tableValues)-1;//columns
		$namesAmount=count($tableName)-1;//rows

		//build insides
		foreach($tableValues as $index => $name){
			$i=0;
			while($i<=$namesAmount){	// Obudowywanie pod Json

				$javaObject=$this->wrapJSON($index,$valuesAmount,$namesAmount,$i,$name,$javaObject,$tableName);
				$i++;
			}
		}

		$javaObject.=']'; //end array wrap
		return $javaObject;

	}

	function wrapJSON($index,$valuesAmount,$namesAmount,$i,$name,$javaObject,$tableName){
		//---- BUILD VARS

		$comparatorRight='';
		$comparatorLeft='';

			if($namesAmount==0){  //For 1 ROW
				$comparatorRight=$valuesAmount;
				$comparatorLeft=$index;
			}
			else{ 		//For more Rows
				$comparatorRight=$namesAmount;
				$comparatorLeft=$i;
			}

		//---- EXECUTE
			if($namesAmount==0){ //For 1 ROW

				if($comparatorLeft==$comparatorRight){
						$javaObject.='{"'.$tableName[$i].'":"'.$name[$i].'"}';
				}else{
						$javaObject.='{"'.$tableName[$i].'":"'.$name[$i].'"},';
				}

			}else{ //For more Rows

				if($i==0){$javaObject.='{';} //Wrap start
					if($comparatorLeft==$comparatorRight){
							$javaObject.='"'.$tableName[$i].'":"'.$name[$i].'"';
					}else{
							$javaObject.='"'.$tableName[$i].'":"'.$name[$i].'",';
					}
				if($comparatorLeft==$comparatorRight && $index!=$valuesAmount){
					$javaObject.='},';
				}elseif($comparatorLeft==$comparatorRight){
					$javaObject.='}';
				} //Wrap end

			}

		//---- EXIT
		return $javaObject;
	}

}


?>
