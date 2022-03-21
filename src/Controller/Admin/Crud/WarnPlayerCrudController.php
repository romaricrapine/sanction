<?php

namespace App\Controller\Admin\Crud;

use App\Entity\WarnPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WarnPlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WarnPlayer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo_player_warn')->setLabel('Pseudo du Joueur'),
            DateField::new('date_warn')->setLabel('Date de Warn')->setFormat('dd-MM-yyyy à HH\'h\'mm')->onlyWhenUpdating()->onlyOnIndex(),
            AssociationField::new('ReasonWarn')->setLabel('Raison de Sanction')->setRequired('true'),
            TextField::new('screen_warn')->setLabel('Screen de Warn'),
            AssociationField::new('user')->setLabel('Staff')->setRequired('true'),
            TextField::new('ip_player_warn')->setLabel('Ip du Joueur')->setPermission('ROLE_MJ'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission('delete', 'ROLE_ADMIN')
            ->setPermission('batchDelete', 'ROLE_ADMIN')
            ->add('index', Crud::PAGE_DETAIL)
            ->remove('detail', 'index');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Warn des joueurs')
            ->showEntityActionsInlined();
    }

}
