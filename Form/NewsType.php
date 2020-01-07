<?php

namespace Parallalax\DashboardNewsBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use FOS\CKEditorBundle\Form\Type\CKEditorType;


class NewsType extends AbstractType {

	private $class;

	public function __construct($class) {
		$this->class = $class;
	}

    public function buildForm(FormBuilderInterface $builder, array $options) {

		$builder->add('title', TextType::class, array(
					'label' => 'titre'));
		$builder->add('content', CKEditorType::class, array(
					'label' => false,
					'required' => false,
					'config' => [
						'uploadUrl' => '/ckfinder/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
						'filebrowserBrowseUrl' => '/bundles/cksourceckfinder/ckfinder/ckfinder.html',
						'filebrowserImageBrowseUrl' => '/bundles/cksourceckfinder/ckfinder/ckfinder.html?popup=1&type=Images',
						 'filebrowserFlashBrowseUrl' => '/bundles/cksourceckfinder/ckfinder/ckfinder.html?type=Flash',
						 'filebrowserUploadUrl' => '/ckfinder/connector/php/connector.php?command=QuickUpload&type=Files',
						 'filebrowserImageUploadUrl' => '/ckfinder/connector/php/connector.php?command=QuickUpload&type=Images',
						]
				));

		/*$builder->add('type', EntityType::class, [
		    //'class' => \Parallalax\DashboardNewsBundle\Entity\NewsType::class,
            'class' => \AppBundle\Entity\NewsType::class,
            'choice_label' => 'name',
            'placeholder' => 'Choisir un type',
            'empty_data'  => null,
            'required' => true,
            'attr' => [
                'class' => 'js-custom',
                ]
        ]);*/

		$builder->add('position', ChoiceType::class, array(
                    'label' => false,
                    'choices' => array('Gauche' => 'GAUCHE',
                        'Milieu' => 'MILIEU',
                        'Droite' => 'DROITE',
						'En haut' => 'HAUT',
                        'Alerte' => 'ALERTE'
                    ),
                    'choice_value' => function ($choice) {
                        return $choice;
                    },
                    'choices_as_values' => true,
                    'attr' => array('class' => 'js-custom'),
                    'required' => false));

        $builder->add('type', ChoiceType::class, array(
            'label' => false,
            'choices' => array('Auto' => 'AUTO',
                'Crm' => 'CRM',
                'Franchise' => 'FRANCHISE',
                'Partenaires' => 'PARTENAIRES'
            ),
            'choice_value' => function ($choice) {
                return $choice;
            },
            'choices_as_values' => true,
            'attr' => ['class' => 'js-custom', 'placeholder' => 'Choisir un type'],
            'required' => false));

        $builder->add('thumbnail', HiddenType::class);

		$builder->add('submit', SubmitType::class, array(
					'label' => 'Enregistrer',
					'attr' => array('class' => 'btn btn-primary')));
    }

    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults([
            'data_class' => $this->class
        ]);
    }
}
