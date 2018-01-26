<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Helio-Link-Exchange</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item <?php $current_file_name = basename($_SERVER['SCRIPT_NAME']); if ($current_file_name == ("index.php")) {echo "active";}?>">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item <?php $current_file_name = basename($_SERVER['SCRIPT_NAME']); if ($current_file_name == "add.php") {echo "active";}?>">
                    <a class="nav-link" href="/add/">Add You Website</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://heliohost.org">Go to HelioHost</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/HelioNetworks/HelioLinkExchange/">Go to the Github Repo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br /><br />
<div class="container">