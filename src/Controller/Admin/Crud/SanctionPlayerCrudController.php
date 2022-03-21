<?php

namespace App\Controller\Admin\Crud;

use App\Entity\SanctionPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SanctionPlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SanctionPlayer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo_player_sanction')->setLabel('Pseudo'),
            DateTimeField::new('date_sanction')->setLabel('Date')->setFormat('dd-MM-yyyy à HH\'h\'mm')->onlyWhenUpdating()->onlyOnIndex(),
            AssociationField::new('ReasonSanction')->setLabel('Raison')->setRequired('true'),
            TextField::new('screen_sanction')->setLabel('Screen'),
            AssociationField::new('TypeSanction')->setLabel('Type')->setRequired('true'),
            AssociationField::new('TimeSanction')->setLabel('Durée')->setRequired('true'),
            AssociationField::new('user')->setLabel('Staff')->setRequired('true'),
            TextField::new('ip_player_sanction')->setLabel('Ip du Joueur')->setPermission('ROLE_MJ')->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat('full')
            ->setTimezone('Europe/Paris')
            ->setPageTitle('index', 'Sanction des joueurs')
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->setPermission('delete', 'ROLE_ADMIN')
            ->setPermission('batchDelete', 'ROLE_ADMIN')
            ->add('index', Crud::PAGE_DETAIL)
            ->remove('detail', 'index');
    }

}
