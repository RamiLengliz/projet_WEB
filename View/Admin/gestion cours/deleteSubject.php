<?PHP
	include "../../../Controller/subjectC.php";

	$subjectC=new subjectC();
	
	if (isset($_POST["id"])){
		$subjectC->deleteSubject($_POST["id"]);
		header ('Location:ListSubjects.php');
	}
?>