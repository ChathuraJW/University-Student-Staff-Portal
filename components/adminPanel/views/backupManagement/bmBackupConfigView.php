<style>
    .fileEntry {
        border: 1px solid var(--baseColor);
        padding: 8px;
        border-radius: 5px;
        text-decoration: none;
        color: var(--fontColor);
    }
</style>
<div class="changeAdminUser">
    <span class="sectionTitle">Backup Configuration</span>
    <span style="text-align: justify;display: block;">
        In this section, system administrator can create system database backup as well as restore previous backup when needed. To configure
        automatic backup configuration, navigate to <b>Basic System Configuration</b> section and do modify, backup_date, backup_time parameters.
	</span>
    <br>
    <div class="row col-2">
        <div>
            <!--            backup creation section-->
            <span style="font-size: 25px;font-weight: bold;">Create Backup</span><br>
            <span style="text-align: justify;display: block;padding-right: 15px;">
                Hear full system database will be backup and store within the system as well as provide another copy for download, once you
                receive it, make sure to store it in a secure place. As well as system will keep back created withing 1 months, rest will be
                automatically delete form the system.
            </span><br>
            <form action="" method="post">
                <input type="submit" value="Create New Backup" name="createBackup" class="button" style="display: block;margin: auto;"
                       onclick="confirmMessage('Are you sure to make a backup of the system database?')">
            </form>
            <br><br>
            <!--            backup restore by custom file-->
            <span style="font-size: 25px;font-weight: bold;">Restore By File</span><br>
            <span style="text-align: justify;display: block;padding-right: 15px;">
                Upload correct backup file hear for, perform system restore.
            </span><br>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" value="Create New Backup" name="createBackup" class="button fileUpload" style="display: block;margin: auto;" required>
                <br>
                <input type="submit" value="Restore" name="restoreBackup" class="button" style="display: block;margin: auto;"
                       onclick="confirmMessage('Are you sure to perform this action?')">
            </form>
        </div>
        <div>
            <!--            backup restore by in house files-->
            <span style="font-size: 25px;font-weight: bold;">Restore By In-house Backup</span><br>
            <span style="text-align: justify;display: block;padding-right: 15px;">
                In the below list shows the current in-system backups. If you need you can use then to do the restore process. Or else you can
                upload file that you have to continue process.
            </span><br>
            <!--            create file list-->
            <div style="padding-left: 20px;" class="row col-3">
				<?php
					foreach ($controllerData as $file) {
						echo("
                                <a href='?backupName=$file' class='fileEntry' title='$file'>
                                    <div style='text-align: center;'>
                                    <i class='fa fa-database fa-3x'></i><br><br>
                                    " . date("Y-m-d H:i:s", explode('_', $file)[0]) . "
                                    </div>
                                </a>
                            ");
					}
				?>
            </div>
        </div>
    </div>
</div>

<!--jquery with toast function-->
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/toast.js"></script>