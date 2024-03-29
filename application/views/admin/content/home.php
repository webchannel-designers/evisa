<?php echo $this->session->flashdata('message'); ?>

<?php
		if($this->session->userdata('admin_role')==3)
		{

?>
<div class="half_w half_left">

	<div class="h_title">Jobs</div>

		<div class="container">

		<ol>

			<?php foreach($jobs as $job): ?>

			<li><?php echo substr($job['title'],0,50); ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>

<div class="half_w half_left">

	<div class="h_title">Applications</div>

		<div class="container">

		<ol>

			<?php foreach($applications as $application): ?>

			<li><?php echo $application['firstname'].' '.$application['lastname']; ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>
<?php
		}
		else
		{
?>

<div class="half_w half_left">

	<div class="h_title">Contents</div>

		<div class="container">

		<ol>

			<?php foreach($contents as $content): ?>

			<li><?php echo substr($content['title'],0,50); ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>

<div class="half_w half_left">

	<div class="h_title">Contacts</div>

		<div class="container">

		<ol>

			<?php foreach($contacts as $contact): ?>

			<li><?php echo substr(strip_tags($contact['address']),0,50); ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>



<div class="half_w half_left">

	<div class="h_title">Languages</div>

		<div class="container">

		<ol>

			<?php foreach($languages as $language): ?>

			<li><?php echo $language['name']; ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>

<div class="half_w half_left">

	<div class="h_title">Users</div>

		<div class="container">

		<ol>

			<?php foreach($users as $user): ?>

			<li><?php echo $user['name']; ?></li>

			<?php endforeach; ?>

		</ol>

		</div>

</div>
<?php
		}
?>

<div class="clear"></div>