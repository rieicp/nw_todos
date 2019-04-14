
plugin.tx_nwtodos_tasklising {
    view {
        # cat=plugin.tx_nwtodos_tasklising/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:nw_todos/Resources/Private/Templates/
        # cat=plugin.tx_nwtodos_tasklising/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:nw_todos/Resources/Private/Partials/
        # cat=plugin.tx_nwtodos_tasklising/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:nw_todos/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_nwtodos_tasklising//a; type=string; label=Default storage PID
        storagePid =
    }
}
