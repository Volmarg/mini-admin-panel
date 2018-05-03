<?php

@include_once('javascriptTransform.php');

class databaseConnection{

	var $databseConnectionEstablish;

		function __construct(){
			$host="localhost";
			$databaseName="";
			$databaseLogin="";
			$databasePassword="";


			$databseConnectionEstablish=mysqli_connect($host,$databaseLogin,$databasePassword,$databaseName);
			$databseConnectionEstablish->set_charset("utf8");

			$this->databseConnectionEstablish=$databseConnectionEstablish;
		}

}

class askDatabase extends databaseConnection{

		function getDataFromDatabase($query){
			//--------- prebuild vars and calls
			$queryCommit=mysqli_query($this->databseConnectionEstablish,$query);
			$fetchedArray=array();
			$tableNames=array();
			$iterator=0;


			if(count($fetchedArray)!=0){

			}

			//---------iterate over results
				//over column names
			while($fetchedFields=$queryCommit->fetch_field()){#-->

				$tableNames[$iterator]=$fetchedFields->name;
				$iterator++;
			}
				//prepare dimmensions for table of each result
			$namesCount=count($tableNames);
			$namesCount=$namesCount; // As iterator starts from zero, this starts from 1 - FIX
			$dimmension2=0;

				//over each result
			$iterator=0;
			while($result=$queryCommit->fetch_array()){

				while($iterator<=$namesCount){

					$fetchedArray[$dimmension2][$iterator]=$result[$iterator];
					$iterator++;

					//increment 2nd dimm and go to another row
					if($iterator!=0){
						if($iterator%$namesCount==0){
							$dimmension2++;
							$iterator=0;
							break;
						}
					}
				}
			}
			$returnable=array($fetchedArray,$tableNames);
			return $returnable;
		}

		function modifyDataInDatabase($querry){
			$querry=str_replace('\\','',$querry); //Fix

			$queryCommit=mysqli_query($this->databseConnectionEstablish,$querry);
		}

		function testowaFunkcja(){
			echo 'test';
		}
}

class writeToDatabase extends databaseConnection{}

?>
