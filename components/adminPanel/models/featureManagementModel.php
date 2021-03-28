<?php


	class FeatureManagementModel extends Model {

		public static function loadCurrentFeatures(): array {
			$dbInstance = new Database();
			$dbInstance->establishTransaction('admin', 'admin@16');
			$sqlQuery = "SELECT * FROM system_components";
			$allFeatures = $dbInstance->executeTransaction($sqlQuery);
			$featureList = array();
			foreach ($allFeatures as $feature) {
				$featureObject = new SystemFeature();
				$featureObject->createFeature($feature['featureID'], $feature['name'], $feature['path'], $feature['icon'], $feature['isAlive'], $feature['permission']);
				$featureList[] = $featureObject;
			}
			return $featureList;
		}
	}