<?php

	class FeatureManagementController extends Controller {
		public static function init() {
			$currentFeatureList = FeatureManagementModel::loadCurrentFeatures();
			self::createModularView('featureManagement', 'featureManagementView', $currentFeatureList);
		}
	}