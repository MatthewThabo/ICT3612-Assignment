<?php
    class Model {

        private $pdo;
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        // register beneficiary
        public function register($id_number, $full_name, $id_area){
            $statement = $this->pdo->prepare('INSERT INTO `peoplewithdisabilityandolders` (`fullname`, `idnumber`, `paycenter`) VALUES(:fullname, :idnumber, :paycenter)');
            $statement->bindParam('fullname', $full_name);
            $statement->bindParam('idnumber', $id_number);
            $statement->bindParam('area', $id_area);
            $success = $statement->execute();
            return ($success) ? "Beneficiary Added Successfully!!!" : "Failed to add Beneficiary!!!";
        }

        // check pay day
        public function checking($code){
            $statement = $this->pdo->prepare('SELECT * FROM `paydates` WHERE `paycode` = :code');
            $statement->bindParam('code', $code);
            $statement->execute();
            $row = $statement->fetch();
            return (isset($row['payday'])) ? "Your pay day is " . $row['payday'] . "!!!": "Please enter a valid ID Number!!!";
        }

        // delete beneficiary
        public function deleteBeneficiary($id_number){
            $statement = $this->pdo->prepare('DELETE FROM beneficiaries WHERE `idnumber` = :id');
            $statement->bindValue('id', $id_number);
            $success = $statement->execute();
            return ($success) ? "Beneficiary Deleted Successfully!!!" : "Failed to delete Beneficiary!!!";
        }

        // update pay status
        public function updateBeneficiary($id_number){
            $statement = $this->pdo->prepare('SELECT `paidstatus` FROM `beneficiaries` WHERE `idnumber` = :id');
            $statement->bindValue('id', $id_number);
            $statement->execute();
            $row = $statement->fetch();
            $pre_value = $row['paidstatus'];
            $value = intval($pre_value);

            $statement = $this->pdo->prepare('UPDATE beneficiaries SET `paidstatus` = :status WHERE `idnumber` = :id');
            $statement->bindValue('status', ++$value);
            $statement->bindValue('id', $id_number);
            $success = $statement->execute();
            return ($success) ? "Pay Status Updated Successfully!!!" : "Failed to update Pay Status!!!";
        }
    }
?>