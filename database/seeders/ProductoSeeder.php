<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productosPredefinidos = [
            [
                'nombre' => 'PARCHE BORDADO SCSP',
                'precio' => 7.99,
                'imagen' => 'parcheBordado.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/parche-bordado-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA DOGO ANIVERSARIO',
                'precio' => 13.00,
                'imagen' => 'aniversario.png',
                'url' => 'https://andaraxpublicidad.es/producto/camisetadogo-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA DOGO SCSP',
                'precio' => 13.00,
                'imagen' => 'camisetaDogo.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camisetadogo-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'BRAGA SCSP',
                'precio' => 6.00,
                'imagen' => 'braga.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/braga-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'PARCHE PASEO DORADO',
                'precio' => 7.00,
                'imagen' => 'PARCHE-PASEO.png',
                'url' => 'https://andaraxpublicidad.es/producto/parche-paseo-dorado/',
                'user_id' => null
            ], [
                'nombre' => 'DOGO SCSP+ANIVERSARIO',
                'precio' => 16.00,
                'imagen' => 'ANIVERSARIO-03.png',
                'url' => 'https://andaraxpublicidad.es/producto/dogo-scsp-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 2 PEGATINAS PASEO DORADO',
                'precio' => 1.00,
                'imagen' => 'PEGATINAS-PASEO.png',
                'url' => 'https://andaraxpublicidad.es/producto/pack2-pegatina-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 2 PEGATINAS SCSP',
                'precio' => 1.00,
                'imagen' => '1.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/pack2-pegatina-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA DOGO CALAVERA MOTERA',
                'precio' => 13.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-12.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-dogo-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA CREMALLERA SCSP',
                'precio' => 28.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.13-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-cremallera-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'GORRA SCSP',
                'precio' => 7.00,
                'imagen' => 'WhatsApp-Image-2022-03-07-at-9.49.12-AM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/gorra-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CHAPA SCSP 3.5 CM',
                'precio' => 1.00,
                'imagen' => 'Chapa-Frontal-1.png',
                'url' => 'https://andaraxpublicidad.es/producto/chapa-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA JAMAICA ANIVERSARIO',
                'precio' => 11.00,
                'imagen' => 'ANIVERSARIO-05.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-jamaica-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA BRENDA SCSP',
                'precio' => 10.00,
                'imagen' => 'WhatsApp-Image-2022-03-03-at-4.38.30-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-brenda-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'BANDANA SCSP',
                'precio' => 5.00,
                'imagen' => 'WhatsApp-Image-2022-03-14-at-7.49.59-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/bandana-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA DOGO PASEO DORADO',
                'precio' => 13.00,
                'imagen' => 'DOGO-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/dogodogo-paseodorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA JAMAICA SCSP+ANIVERSARIO',
                'precio' => 14.00,
                'imagen' => 'ANIVERSARIO-05.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-jamaica-scsp-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA JAMAICA PASEO DORADO',
                'precio' => 11.00,
                'imagen' => 'JAMAICA-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/jamaica-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA SCSP',
                'precio' => 25.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.12-PM-2.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-oficial-scsp/',
                'user_id' => null
            ],

            [
                'nombre' => 'CAMISETA DOGO PASEO BLANCO',
                'precio' => 13.00,
                'imagen' => 'SCSP_PASEO_BLANCO-03.png',
                'url' => 'https://andaraxpublicidad.es/producto/camisetadogo-paseoblanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CLASICA SCSP',
                'precio' => 19.50,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.12-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-clasica-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA JAMAICA CALAVERA MOTERA',
                'precio' => 11.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-13.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-jamaica-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TECNICA ANIVERSARIO',
                'precio' => 12.00,
                'imagen' => 'CAMISETA-TECNICA-ANIVERSARIO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-tecnica-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CLASICA SCSP+ANIVERSARIO',
                'precio' => 22.50,
                'imagen' => 'ANIVERSARIO-19.png',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-clasica-scsp-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'PASAPORTE SCSP',
                'precio' => 3.00,
                'imagen' => 'WhatsApp-Image-2022-03-05-at-1.10.58-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/pasaporte-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA CREMALLERA CALAVERA MOTERA',
                'precio' => 28.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-05.png',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-cremallera-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA SCSP+ANIVERSARIO',
                'precio' => 16.00,
                'imagen' => 'ANIVERSARIO-15.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-ml-scsp-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'POLO SCSP',
                'precio' => 25.00,
                'imagen' => 'WhatsApp-Image-2022-03-08-at-9.05.22-AM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/polo-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 2 PEGATINAS CALAVERA',
                'precio' => 1.00,
                'imagen' => 'PEGATINAS-01.png',
                'url' => 'https://andaraxpublicidad.es/producto/pack-2pegatinas-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'BANDERA SCSP 40 x 30 CM PERSONALIZABLE',
                'precio' => 18.50,
                'imagen' => 'WhatsApp-Image-2022-03-05-at-1.18.46-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/bandera-scsp-40x30cm/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA EXTREME MUJER CALAVERA MOTERA',
                'precio' => 12.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-18.png',
                'url' => 'https://andaraxpublicidad.es/producto/extreme-mujer-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'BANDERA SCSP 110X70 CM PERSONALIZABLE',
                'precio' => 30.00,
                'imagen' => 'WhatsApp-Image-2022-05-19-at-10.06.42-AM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/bandera-scsp-110x70cm/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA JAMAICA PASEO BLANCO',
                'precio' => 11.00,
                'imagen' => 'SCSP_PASEO_BLANCO-05.png',
                'url' => 'https://andaraxpublicidad.es/producto/jamaica-paseo-blanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA BRENDA PASEO BLANCO',
                'precio' => 10.00,
                'imagen' => 'SCSP_PASEO_BLANCO-01.png',
                'url' => 'https://andaraxpublicidad.es/producto/brenda-paseo-blanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'CHALECO CREMALLERA SCSP',
                'precio' => 15.00,
                'imagen' => 'CHALECO-CREMALLERA-26.png',
                'url' => 'https://andaraxpublicidad.es/producto/chaleco-cremallera-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA EXTREME MUJER SCSP',
                'precio' => 12.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.14-PM-2.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-extrememujer-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'LOTE SCSP+PASEO',
                'precio' => 18.00,
                'imagen' => 'LOTE-2023.png',
                'url' => 'https://andaraxpublicidad.es/producto/lote-scsp-paseo/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA BRENDA SCSP+ANIVERSARIO',
                'precio' => 13.00,
                'imagen' => 'BRENDA-PECHO-ANIVERSARIO.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-brenda-scsp-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TEXAS ANIVERSARIO',
                'precio' => 10.00,
                'imagen' => 'ANIVERSARIO-09.png',
                'url' => 'https://andaraxpublicidad.es/producto/texas-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA EXTREME SCSP',
                'precio' => 13.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.14-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-extreme-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA EXTREME CALAVERA MOTERA',
                'precio' => 13.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-11.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-extreme-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CLASICA CALAVERA MOTERA',
                'precio' => 19.50,
                'imagen' => 'VISUALES-DISENO-CALAVERA-17.png',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-clasica-calavera/',
                'user_id' => null
            ],

            [
                'nombre' => 'CAMISETA BRENDA CALAVERA',
                'precio' => 10.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-14.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-brenda-calavera/',
                'user_id' => null
            ],

            [
                'nombre' => 'CAMISETA MANGA LARGA MUJER SCSP+ANIVERSARIO',
                'precio' => 15.00,
                'imagen' => 'ANIVERSARIO-17.png',
                'url' => 'https://andaraxpublicidad.es/producto/extreme-ml-scsp-aniversario/',
                'user_id' => null
            ],

            [
                'nombre' => 'SUDADERA CLASICA PASEO BLANCO',
                'precio' => 19.50,
                'imagen' => 'SCSP_PASEO_BLANCO-09.png',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-clasica-paseo-blanco/',
                'user_id' => null
            ],

            [
                'nombre' => 'CAMISETA TEXAS PASEO DORADO',
                'precio' => 10.00,
                'imagen' => 'TEXAS-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/texas-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA BRENDA PASEO DORADO',
                'precio' => 10.00,
                'imagen' => 'BRENDA-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/brenda-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA ANIVERSARIO',
                'precio' => 25.00,
                'imagen' => 'WhatsApp-Image-2022-01-21-at-9.39.05-PM-3-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA INFANTIL ANIVERSARIO',
                'precio' => 10.00,
                'imagen' => 'ANIVERSARIO-03.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-infantil-aniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA PASEO DORADO',
                'precio' => 13.00,
                'imagen' => 'EXTREME-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-ml-paseodorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CLASICA PASEO DORADO',
                'precio' => 19.50,
                'imagen' => 'CLASICA-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-clasica-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 5 BANDERAS 110X70 CM PERSONALIZABLE',
                'precio' => 110.00,
                'imagen' => 'WhatsApp-Image-2022-03-05-at-1.18.46-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/pack5-banderas-110x70cm/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 5 BANDERAS 40X30 CM PERSONALIZABLE',
                'precio' => 45.00,
                'imagen' => 'WhatsApp-Image-2022-03-05-at-1.18.14-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/bandera-scsp-40x30-pack5/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA SCSP INFANTIL',
                'precio' => 10.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.09-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-scsp-infantil/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TEXAS SCSP',
                'precio' => 10.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.11-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-texas-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CHALECO SCSP VELCRO',
                'precio' => 6.00,
                'imagen' => 'WhatsApp-Image-2022-02-11-at-7.55.16-PM-1.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/chaleco-velcro-scsp/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA OFICIAL+ANIVERSARIO TALLA G',
                'precio' => 19.00,
                'imagen' => 'ANIVERSARIO-15.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-manga-larga-oficialaniversario-talla-g/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA MUJER ANIVERSARIO',
                'precio' => 15.00,
                'imagen' => 'ANIVERSARIO-17.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-manga-larga-mujer-scspaniversario/',
                'user_id' => null
            ],
            [
                'nombre' => 'POLO CALAVERA MOTERA',
                'precio' => 25.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-19.png',
                'url' => 'https://andaraxpublicidad.es/producto/polo-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TEXAS CALAVERA MOTERA',
                'precio' => 10.00,
                'imagen' => 'VISUALES-DISENO-CALAVERA-15.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-texas-calavera/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA PASEO BLANCO TALLA G',
                'precio' => 19.00,
                'imagen' => 'SCSP_PASEO_BLANCO-15.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-mangalarga-paseoblanco-g/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TECNICA PASEO BLANCO',
                'precio' => 12.00,
                'imagen' => 'CAMISETA-TECNICA-PASEO-BLANCO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-tecnica-paseoblanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA CREMALLERA ANIVERSARIO',
                'precio' => 28.00,
                'imagen' => 'ANIVERSARIO-14.png',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-cremallera-aniversairo/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA MUJER PASEO BLANCO',
                'precio' => 12.00,
                'imagen' => 'SCSP_PASEO_BLANCO-17.png',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-ml-paseo-blanco-mujer/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA MANGA LARGA PASEO DORADO MUJER',
                'precio' => 12.00,
                'imagen' => 'EXTREME-WOMAN-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/camiseta-ml-paseodorado-mujer/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA CREMALLERA PASEO BLANCO',
                'precio' => 28.00,
                'imagen' => 'SCSP_PASEO_BLANCO-12.png',
                'url' => 'https://andaraxpublicidad.es/producto/capucha-cremallera-paseo-blanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA CREMALLERA PASEO DORADO',
                'precio' => 28.00,
                'imagen' => 'CREMALLERA-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/sudadera-capucha-cremallera-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA PASEO BLANCO',
                'precio' => 25.00,
                'imagen' => 'SCSP_PASEO_BLANCO-14.png',
                'url' => 'https://andaraxpublicidad.es/producto/capucha-paseo-blanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'SUDADERA CAPUCHA PASEO DORADO',
                'precio' => 25.00,
                'imagen' => 'CAPUCHA-PASEO-DORADO.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/capucha-paseo-dorado/',
                'user_id' => null
            ],
            [
                'nombre' => 'CAMISETA TEXAS PASEO BLANCO',
                'precio' => 10.00,
                'imagen' => 'SCSP_PASEO_BLANCO-07.png',
                'url' => 'https://andaraxpublicidad.es/producto/texas-paseo-blanco/',
                'user_id' => null
            ],
            [
                'nombre' => 'PACK 175 PEGATINAS PERSONALIZABLES',
                'precio' => 55.00,
                'imagen' => '1.jpg',
                'url' => 'https://andaraxpublicidad.es/producto/pack-175-pegatinas-personalizables/',
                'user_id' => null
            ],
            [
                'nombre' => 'MASCARILLA SCSP',
                'precio' => 7.00,
                'imagen' => 'WhatsApp-Image-2022-03-05-at-1.08.40-PM.jpeg',
                'url' => 'https://andaraxpublicidad.es/producto/mascarilla-scsp/',
                'user_id' => null
            ],

        ];
        DB::table('productos')->insert($productosPredefinidos);
    }
}
