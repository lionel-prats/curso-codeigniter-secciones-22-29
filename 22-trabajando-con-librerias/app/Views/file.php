<?php echo $this->extend("layouts/web"); ?>
<?php echo $this->section("content"); ?>
    <h1 class="text-center"><?php echo $title; ?></h1>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Basename</th>
                    <th scope="col">Modified</th>
                    <th scope="col">Real Path</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Random Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Mime</th>
                    <th scope="col">Extension</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $file->getBasename(); ?></td>
                    <td><?php echo $file->getMTime(); ?></td>
                    <td><?php echo $file->getRealPath(); ?></td>
                    <td><?php echo $file->getPerms(); ?></td>
                    <td><?php echo $file->getRandomName(); ?></td>
                    <!-- <td><?php //echo $file->getSizeByUnit("kb"); ?> kb</td> -->
                    <td><?php echo $file->getSizeByUnit("mb"); ?> mb</td>
                    <td><?php echo $file->getMimeType(); ?></td>
                    <td><?php echo $file->getExtension(); ?></td>
                </tr>
                <tr>
                    <td><?php echo $path_file_in_writable_folder->getBasename(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getMTime(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getRealPath(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getPerms(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getRandomName(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getSizeByUnit("kb"); ?> kb</td>
                    <!-- <td><?php //echo $path_file_in_writable_folder->getSizeByUnit("mb"); ?> mb</td> -->
                    <td><?php echo $path_file_in_writable_folder->getMimeType(); ?></td>
                    <td><?php echo $path_file_in_writable_folder->getExtension(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php echo $this->endSection(); ?>