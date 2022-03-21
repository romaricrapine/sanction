<?php

namespace App\Controller\Admin\Crud;

use App\Entity\ReasonSanction;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReasonSanctionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReasonSanction::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Liste des Raisons')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat('full')
            ->setTimezone('Europe/Paris')
            ->setPageTitle('index', 'Liste des Raisons')
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission('delete', 'ROLE_ADMIN')
            ->setPermission('edit', 'ROLE_ADMIN')
            ->setPermission('batchDelete', 'ROLE_ADMIN')
            ->remove('detail', 'index');
    }

}
