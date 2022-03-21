<?php

namespace App\Controller\Admin\Crud;

use App\Entity\TypeSanction;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeSanctionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeSanction::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Type de Sanction')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Type de Sanction')
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
