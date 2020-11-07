<?php
class Prestations extends Controller
{

    public function vidange()
    {
        // chargement de la vue
        $this->view('prestations/vidange');
    }

    public function clim()
    {
        // chargement de la vue
        $this->view('prestations/clim');
    }

    public function frein()
    {
        // chargement de la vue
        $this->view('prestations/frein');
    }

    public function navigation()
    {
        // chargement de la vue
        $this->view('prestations/navigation');
    }

    public function pneu()
    {
        // chargement de la vue
        $this->view('prestations/pneu');
    }

    public function revisions()
    {
        // chargement de la vue
        $this->view('prestations/revisions');
    }

    public function suspensions()
    {
        // chargement de la vue
        $this->view('prestations/suspensions');
    }
}
