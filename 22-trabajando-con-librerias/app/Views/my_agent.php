<?php echo $this->extend("layouts/web"); ?>
<?php echo $this->section("content"); ?>
    <h1><?php echo $title; ?></h1>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Navegador</th>
                    <th scope="col">Versión (navegador)</th>
                    <th scope="col">Dispositivo móvil</th>
                    <th scope="col">Robot</th>
                    <th scope="col">Plataforma</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $agent->getBrowser(); ?></td>
                    <td><?php echo $agent->getVersion(); ?></td>
                    <td><?php echo $agent->getMobile(); ?></td>
                    <td><?php echo $agent->getRobot(); ?></td>
                    <td><?php echo $agent->getPlatform(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php echo $this->endSection(); ?>