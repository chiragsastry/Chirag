
<?php if(Yii::app()->user->getState('stud_id'))
{
$studentmodel = StudentTransaction::model()->find('student_transaction_id='.Yii::app()->user->getState('stud_id'));
$photo = StudentPhotos::model()->findByPk($studentmodel->student_transaction_student_photos_id);
?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($photo->student_photos_path != null)	
		echo CHtml::image(Yii::app()->baseUrl.'/stud_images/'.$photo->student_photos_path,"",array("width"=>"175px","height"=>"160px"));
	?>
	</div>
	</br>
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Personal Info',array('StudentTransaction/Update','id'=>Yii::app()->user->getState('stud_id'),'#'=>'form1'),array('title'=>'Personal Info'));
		?>
	</div>

	<div id="divlink5" class="info-link">
		<?php
		echo CHtml::link('Documents',array('studentDocsTrans/StudentDocs'),array('title'=>'My Documents'));
		?>
	</div>
	<div id="divlink6" class="info-link">
		<?php
		echo CHtml::link('Qualifications',array('StudentAcademicRecordTrans/StudentAcademicRecords'),array('title'=>'My Qualifications'));
		?>
	</div>
	<div id="divlink7" class="info-link">
		<?php
		echo CHtml::link('Performances',array('FeedbackDetailsTable/StudentPerformance'),array('title'=>'My Performances'));
		?>
	</div>
	
	<?php 
		if(Yii::app()->user->checkAccess('StudentFeesMaster.MyFees') ) {
	?>	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('Show Fees',array('studentFeesMaster/myfees', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My Fees','style'=>'text-decoration:none;color:white;'));
		
		?>	</div>
	<?php
	}	
		?>
	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('Paid Fees Details',array('feesPaymentTransaction/studentFeesReportwithoutform'),array('title'=>'My Paid Fees','style'=>'text-decoration:none;color:white;'));
		
		?>
	</div>
		<?php 
		if(Yii::app()->user->checkAccess('Report.Studenthistory') ) {
	?>	<div id="divlink8" class="info-link">
	<?php	echo CHtml::link('History',array('report/studenthistory', 'id'=>Yii::app()->user->getState('stud_id')),array('title'=>'My History','style'=>'text-decoration:none;color:white;'));
		
		}
		?>
	</div>

</div>

<?php
} //end student if
 
else if(Yii::app()->user->getState('emp_id'))
{
$employeemodel = EmployeeTransaction::model()->find('employee_transaction_id='.Yii::app()->user->getState('emp_id'));
$info = EmployeeInfo::model()->findByPk($employeemodel->employee_transaction_employee_id);
$photo = EmployeePhotos::model()->findByPk($employeemodel->employee_transaction_emp_photos_id);

?>
<div id="menulink">
	<div id="studentlogo">
	<?php
		if($employeemodel->Rel_Photo->employee_photos_path != null)
			echo CHtml::image(Yii::app()->baseUrl.'/emp_images/'.$photo->employee_photos_path,"",array("width"=>"175px","height"=>"160px"));	
	?>
	</div>
	</br>
	<div id="divlink1" class="info-link">
	<?php
		echo CHtml::link('Personal Info',array('EmployeeTransaction/Update','id'=>Yii::app()->user->getState('emp_id'),'#'=>'form1'),array('title'=>'Personal Info'));
	?>
	</div>
	<div id="divlink5" class="info-link">
	<?php
		echo CHtml::link('Document',array('EmployeeDocsTrans/Employeedocs','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Documents'));
	?>
	</div>
	
	<div id="divlink6" class="info-link">
	<?php
		echo CHtml::link('Qualification',array('EmployeeAcademicRecordTrans/EmployeeAcademicRecords','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Qualifications'));
	?>
	</div>
	<div id="divlink7" class="info-link">
	<?php
		echo CHtml::link('Experience',array('EmployeeExperienceTrans/EmployeeExperience','id'=>Yii::app()->user->getState('emp_id')),array('title'=>'My Experience'));
	?>
	</div>

</div>

<?php
} //end employee if
else
//if(Yii::app()->user->isSuperuser)
{
?>
<div id="menulink">
	<div id="divlink1" class="info-link">
		<?php
		echo CHtml::link('Organizations',array('Organization/admin'),array('title'=>'Organizations'));
		?>
	</div>
	<div id="divlink2" class="info-link">
		<?php
		echo CHtml::link('Add Admin',array('User/admin'),array('title'=>'Create Admin'));
		?>
	</div>
	<div id="divlink3" class="info-link">
		<?php
		echo CHtml::link('User Management',array('/rights'),array('title'=>'User Management'));
		?>
	</div>
		
</div>
<?php
}
?>
