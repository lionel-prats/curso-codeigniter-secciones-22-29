<?php echo $this->extend("layouts/web"); ?>
<?php echo $this->section("content"); ?>
    <h1 class="text-center"><?php echo $title; ?></h1>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Esquema</th>
                    <th scope="col">Auth</th>
                    <th scope="col">Host</th>
                    <th scope="col">Puerto</th>
                    <th scope="col">Path</th>
                    <th scope="col">Query</th>
                    <th scope="col">QS id-acta</th>
                    <th scope="col">QS concurso</th>
                    <th scope="col">Fragment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $uri->getScheme(); ?></td>
                    <td><?php echo $uri->getAuthority(); ?></td>
                    <td><?php echo $uri->getHost(); ?></td>
                    <td><?php echo $uri->getPort(); ?></td>
                    <td><?php echo $uri->getPath(); ?></td>
                    <td><?php echo $uri->getQuery(); ?></td>
                    <td><?php echo $uri->getQuery(["only" => "id-acta"]); ?></td>
                    <td><?php echo $uri->getQuery(["only" => "concurso"]); ?></td>
                    <td><?php echo $uri->getFragment(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php echo $this->endSection(); ?>