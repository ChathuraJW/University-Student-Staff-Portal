<?php

	class HallAllocation {
		// attributes of HallAllocation
		private int $reservationID;
		private string $reservedBy;
		private string $reservedFullName;
		private string $hallID;
		private int $reservationType;
		private string $from;
		private string $to;
		private string $description;
		private string $approvedBy;
		private string $reservationState;
		private string $approvalTimestamp;
		private string $requestMadeAt;
		private bool $isUnderReview;

		// methods of HallAllocation
		public function setAllocationFull($reservationID, $reserveUserName, $hallID, $description, $type, $fromTimestamp,
		                                  $toTimestamp, $requestMadeAt, $reservationStates, $approvedBy, $approvalTimestamp, $fullName): HallAllocation {
			$this->reservationID = $reservationID;
			$this->reservedBy = $reserveUserName;
			$this->reservedFullName = $fullName;
			$this->hallID = $hallID;
			$this->description = $description;
			$this->reservationType = $type;
			$this->from = $fromTimestamp;
			$this->to = $toTimestamp;
			$this->requestMadeAt = $requestMadeAt;
			$this->reservationState = $reservationStates;
			$this->approvedBy = $approvedBy;
			$this->approvalTimestamp = $approvalTimestamp;
			return $this;
		}

		public function setAllocation($reservationID, $reserveUserName, $reserveFullName, $hallID, $description, $type, $fromTimestamp,
		                              $toTimestamp, $requestMadeAt, $reservationStates): HallAllocation {
			$this->reservationID = $reservationID;
			$this->reservedBy = $reserveUserName;
			$this->reservedFullName = $reserveFullName;
			$this->hallID = $hallID;
			$this->description = $description;
			$this->reservationType = $type;
			$this->from = $fromTimestamp;
			$this->to = $toTimestamp;
			$this->requestMadeAt = $requestMadeAt;
			$this->reservationState = $reservationStates;
			return $this;
		}

		public function createBasicAllocation($reserveUserName, $hallID, $description, $type, $fromTimestamp, $toTimestamp): HallAllocation {
			$this->reservedBy = $reserveUserName;
			$this->hallID = $hallID;
			$this->description = $description;
			$this->reservationType = $type;
			$this->from = $fromTimestamp;
			$this->to = $toTimestamp;
			return $this;
		}

		public function createSameSlotEntry($reservationID, $hallID, $reserveUserName, $fullName, $type, $requestMadeAt,
		                                    $reservationStates, $isUnderReview): HallAllocation {
			$this->reservationID = $reservationID;
			$this->reservedBy = $reserveUserName;
			$this->reservedFullName = $fullName;
			$this->hallID = $hallID;
			$this->reservationType = $type;
			$this->requestMadeAt = $requestMadeAt;
			$this->reservationState = $reservationStates;
			$this->isUnderReview = $isUnderReview;
			return $this;
		}

		public function getReservationID(): int {
			return $this->reservationID;
		}

		public function getReservedBy(): string {
			return $this->reservedBy;
		}

		public function getHallID(): string {
			return $this->hallID;
		}

		public function getReservationType(): string {
			switch ($this->reservationType) {
				case 3100:
					return "Lecture";
				case 3200:
					return "Tutorial";
				case 3300:
					return "Staff Meeting";
				case 3400:
					return "Club Meeting";
				case 3500:
					return "Student Meeting";
			}
		}

		public function getReservationTypeAsInt(): int {
			return $this->reservationType;
		}

		public function getFrom(): string {
			return $this->from;
		}

		public function getTo(): string {
			return $this->to;
		}

		public function getRequestMadeAt(): string {
			return $this->requestMadeAt;
		}

		public function getDescription(): string {
			return $this->description;
		}

		public function getApprovedBy(): string {
			return $this->approvedBy;
		}

		public function getReservationState(): string {
			return match ($this->reservationState) {
				"A" => "Approved",
				"R" => "Rejected",
				"T" => "Time Out",
				"N" => "Pending",
				default => '',
			};
		}


		public function getColorClassForReservationState(): string {
			return match ($this->reservationState) {
				"A" => "successEntry",
				"R" => "warningEntry",
				"T" => "ideaEntry",
				"N" => "normalEntry",
				default => '',
			};
		}

		public function getApprovalTimestamp(): string {
			return $this->approvalTimestamp;
		}

		public function getReservedFullName(): string {
			return $this->reservedFullName;
		}

		public function setReservedFullName(string $reservedFullName): HallAllocation {
			$this->reservedFullName = $reservedFullName;
			return $this;
		}

	}

	class Hall {
		// attributes of Hall
		private string $hallID;
		private int $capacity;
		private string $type;

		// methods of Hall
		public function createHall($hallID, $capacity, $type): Hall {
			$this->hallID = $hallID;
			$this->capacity = $capacity;
			$this->type = $type;
			return $this;
		}

		public function getHallID(): string {
			return $this->hallID;
		}

		public function getCapacity(): int {
			return $this->capacity;
		}

		public function getType(): string {
			return $this->type;
		}

		public function isLecturerHall(): bool {
			if ($this->type === 'LEC')
				return true;
			else
				return false;
		}
	}

?>