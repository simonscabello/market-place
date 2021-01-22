<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    public $categories =
       [
           'Alimentos e Bebidas', 'Automotivo', 'Bebês',
            'Beleza e Cuidados Pessoais', 'Brinquedos e Jogos',
            'Casa, Jardim e Limpeza', 'Celulares e Comunicação',
            'Computadores e Informática', 'Cozinha', 'Eletrônicos, TV e Áudio',
            'Esportes, Aventura e Lazer', 'Ferramentas e Construção',
            'Filmes, Séries e Música', 'Games e Consoles', 'Livros',
            'Papelaria e Escritório', 'Pet Shop', 'Roupas, Calçados e Acessórios'
       ];

    public $slugs =
        [
            'alimentos-e-bebidas', 'automotivo', 'bebes',
            'beleza-e-cuidados-pessoias', 'brinquedos-e-jogos',
            'casa-jardim-e-limpeza', 'celulares-e-comunicacao',
            'computadores-e-informatica', 'cozinha', 'eletronicos-tv-e-audio',
            'esportes-aventura-e-lazer', 'ferramentas-e-construcao',
            'filmes-series-e-musicas', 'games-e-consoles', 'livros',
            'papelaria-e-escritorio', 'pet-shop', 'roupas-calcados-acessorios'
        ];


    public function run()
    {
        foreach(array_combine($this->categories, $this->slugs) as $category => $slug){
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => $slug
            ]);
        }
    }

}
