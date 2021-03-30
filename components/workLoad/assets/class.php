<?php

	class AllocatedWorkload {
		// attributes of AllocatedWorkload
		private $workloadID;
		private $workLoadOwner;
		private $workLoadDescription;
		private $title;
		private $location;
		private $Date;
		private $fromTime;
		// private $toDate;
		private $toTime;
		private $salutation;
		private $fullName;
		private $requestDate;

		// mothods of AllocatedWorkload

		public function getWorkLoadOwner() {
			return $this->workLoadOwner;
		}

		public function getWorkLoadDescription() {
			return $this->workLoadDescription;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getLocation() {
			return $this->location;
		}

		public function getDate() {
			return $this->Date;
		}

		public function getFromTime() {
			return $this->fromTime;
		}
		// public function getToDate(){
		//     return $this->toDate;
		// }
		public function getToTime() {
			return $this->toTime;
		}

		public function getSalutation() {
			return $this->salutation;
		}

		public function getFullName() {
			return $this->fullName;
		}

		public function getRequestDate() {
			return $this->requestDate;
		}

		public function getWorkloadID() {
			return $this->workloadID;
		}


		public function setWorkLoad($workLoadOwner, $title, $workLoadDescription, $location, $Date, $fromTime, $toTime, $salutation, $fullName, $requestDate, $workloadID) {
			$this->workLoadOwner = $workLoadOwner;
			$this->workLoadDescription = $workLoadDescription;
			$this->title = $title;
			$this->location = $location;
			$this->Date = $Date;
			$this->fromTime = $fromTime;
			$this->toTime = $toTime;
			$this->salutation = $salutation;
			$this->fullName = $fullName;
			$this->requestDate = $requestDate;
			$this->workloadID = $workloadID;
			return $this;
		}

	}

?>