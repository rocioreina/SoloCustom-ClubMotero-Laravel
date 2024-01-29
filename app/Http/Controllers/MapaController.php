<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapaController extends Controller
{
    private $ciudades;

    private $ciudadesCoordenadas =[
        'córdoba' => ['lat' => 37.8882, 'lng' => -4.7794],
        'cadiz' => ['lat' => 36.5298, 'lng' => -6.2924],
        'sevilla' => ['lat' => 37.3886, 'lng' => -5.9823],
        'granada' => ['lat' => 37.1773, 'lng' => -3.5986],
        'malaga' => ['lat' => 36.7213, 'lng' => -4.4215],
        'huelva' => ['lat' => 37.2614, 'lng' => -6.9447],
        'almeria' => ['lat' => 36.8340, 'lng' => -2.4637],
        'murcia' => ['lat' => 37.9838, 'lng' => -1.1280],
        'castellon' => ['lat' => 39.9866, 'lng' => -0.0369],
        'valencia' => ['lat' => 39.4699, 'lng' => -0.3763],
        'girona' => ['lat' => 41.9794, 'lng' => 2.8214],
        'lleida' => ['lat' => 41.6148, 'lng' => 0.6269],
        'tarragona' => ['lat' => 41.1189, 'lng' => 1.2445],
        'cataluña' => ['lat' => 41.5912, 'lng' => 1.5209],
        'zaragoza' => ['lat' => 41.6488, 'lng' => -0.8891],
        'huesca' => ['lat' => 42.1361, 'lng' => -0.4087],
        'aragon' => ['lat' => 41.6488, 'lng' => -0.8891],
        'navarra' => ['lat' => 42.6954, 'lng' => -1.6761],
        'paisvasco' => ['lat' => 42.9836, 'lng' => -2.1412],
        'cantabria' => ['lat' => 43.2630, 'lng' => -3.9386],
        'asturias' => ['lat' => 43.3614, 'lng' => -5.8593],
        'galicia' => ['lat' => 42.5751, 'lng' => -8.1339],
        'castillayleón' => ['lat' => 41.8356, 'lng' => -4.1511],
        'avila' => ['lat' => 40.6560, 'lng' => -4.6976],
        'valladolid' => ['lat' => 41.6520, 'lng' => -4.7289],
        'salamancayzamora' => ['lat' => 40.9701, 'lng' => -5.6635],
        'burgos' => ['lat' => 42.3430, 'lng' => -3.6969],
        'extremadura' => ['lat' => 39.4840, 'lng' => -6.3709],
        'badajoz' => ['lat' => 38.8794, 'lng' => -6.9707],
        'albacete' => ['lat' => 38.9945, 'lng' => -1.8585],
        'ciudadreal' => ['lat' => 38.9863, 'lng' => -3.9272],
        'cuenca' => ['lat' => 40.0704, 'lng' => -2.1374],
        'larioja' => ['lat' => 42.2871, 'lng' => -2.5396],
        'grancanaria' => ['lat' => 28.1248, 'lng' => -15.4300],
        'tenerife' => ['lat' => 28.2916, 'lng' => -16.6291],
        'mallorca' => ['lat' => 39.6953, 'lng' => 3.0176],

    ];

    public function __construct()
    {
        $this->ciudades = [
            'córdoba' => 'Córdoba',
            'cadiz' => 'Cádiz',
            'sevilla' => 'Sevilla',
            'granada' => 'Granada',
            'malaga' => 'Málaga',
            'huelva' => 'Huelva',
            'almeria' => 'Almería',
            'murcia' => 'Murcia',
            'castellon' => 'Castellón',
            'valencia' => 'Valencia',
            'girona' => 'Girona',
            'lleida' => 'Lleida',
            'tarragona' => 'Tarragona',
            'cataluña' => 'Cataluña',
            'zaragoza' => 'Zaragoza',
            'huesca' => 'Huesca',
            'aragon' => 'Aragón',
            'navarra' => 'Navarra',
            'paisvasco' => 'País Vasco',
            'cantabria' => 'Cantabria',
            'asturias' => 'Asturias',
            'galicia' => 'Galicia',
            'castillayleón' => 'Castilla y León',
            'avila' => 'Ávila',
            'valladolid' => 'Valladolid',
            'salamancayzamora' => 'Salamanca y Zamora',
            'burgos' => 'Burgos',
            'extremadura' => 'Extremadura',
            'badajoz' => 'Badajoz',
            'albacete' => 'Albacete',
            'ciudadreal' => 'Ciudad Real',
            'cuenca' => 'Cuenca',
            'larioja' => 'La Rioja',
            'grancanaria' => 'Gran Canaria',
            'tenerife' => 'Tenerife',
            'mallorca' => 'Mallorca',
        ];
    }
    public function index()
    {
        return view('mapas.index', ['ciudades' => $this->ciudades, 'ciudadesCoordenadas' => $this->ciudadesCoordenadas]);
    }


    // ...

    public function show(Request $request)
    {
        $latitud = $request->input('latitud');
        $longitud = $request->input('longitud');

        // Lógica para obtener el nombre de la ciudad basado en las coordenadas
        $ciudadSeleccionada = $this->determinarCiudadPorCoordenadas($latitud, $longitud);

        // Agrega esta línea para verificar el valor de $ciudadSeleccionada
        Log::info('Valor de $ciudadSeleccionada:', ['valor' => $ciudadSeleccionada]);

        // Lógica para obtener el enlace de WhatsApp basado en la ciudad
        $enlaceWhatsapp = $this->obtenerEnlaceWhatsApp($ciudadSeleccionada);

        return view('mapas.show', [
            'ciudades' => $this->ciudades,
            'ciudadSeleccionada' => $ciudadSeleccionada,
            'enlaceWhatsapp' => $enlaceWhatsapp,
        ]);
    }


    private function determinarCiudadPorCoordenadas($lat, $lng)
    {
        // URL de la API de Nominatim
        $nominatimApiUrl = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$lat&lon=$lng";

        // Crea una instancia del cliente Guzzle
        $client = new Client();

        try {
            // Realiza una solicitud GET a Nominatim
            $response = $client->get($nominatimApiUrl);

            // Decodifica la respuesta JSON
            $data = json_decode($response->getBody(), true);

            // Mapea las posibles propiedades de ciudad
            $cityProperties = ['city', 'town', 'village', 'county'];

            // Agrega registros para depuración
            Log::info('Respuesta de Nominatim:', ['data' => $data]);

            // Busca en las propiedades de ciudad
            foreach ($cityProperties as $property) {
                if (isset($data['address'][$property])) {
                    $city = strtolower($data['address'][$property]);
                    Log::info('Ciudad encontrada:', ['city' => $city, 'property' => $property]);
                    break;
                }
            }

            // Verifica si se encontró la ciudad
            if (isset($city)) {
                return $city;
            } else {
                Log::warning('No se encontró la ciudad en las propiedades esperadas.');
            }
        } catch (\Exception $e) {
            // Registra el error usando la clase Log con el espacio de nombres adecuado
            Log::error('Error al determinar la ciudad: ' . $e->getMessage());

            // Devuelve un mensaje de error más descriptivo
            return 'Error al determinar la ciudad. Por favor, inténtalo de nuevo más tarde.';
        }

        // Retorna null si no se puede determinar la ciudad
        return null;
    }



    private function obtenerEnlaceWhatsApp($ciudad)
    {
        //ARRAY ENLACECIUDADES
        //DEVOLVER EL ENLACE SI SE ENCUENTRA O UN VALOR PREDETERMINADO SI NO EXISTE EL ENLACE
        // return $this->enlaceWhatsApp[$ciudad]?? 'enlace de WhatsApp no disponible';
        $enlacesPorCiudad = [
            'córdoba' => 'https://chat.whatsapp.com/LwzLR3XQnec7xSSIeFA1z3',
            'cadiz' => 'https://chat.whatsapp.com/Blw2IOsoRfZ8WjP6ayDIsH',
            'sevilla' => 'https://chat.whatsapp.com/IGZmLbZ7EsA5PgG4EndKQS',
            'granada' => 'https://chat.whatsapp.com/Ch1mRy1sAeX4bbSQctK1UR',
            'malaga' => 'https://chat.whatsapp.com/F3hnfHkCtXzFV2tEFTp1VZ',
            'jaen' => 'https://chat.whatsapp.com/BM0INmxCp0o6UsOfJM6wLd',
            'huelva' => 'https://chat.whatsapp.com/FjljoYyOONh0X11p7ltHQo',
            'almeria' => 'https://chat.whatsapp.com/DZjfX6KX8vOJ8ecHHyW1bn',
            'murcia' => 'https://chat.whatsapp.com/LwluOfv19DI4uEFvGr2QOt',
            'castellon' => 'https://chat.whatsapp.com/Fg1Ln9bmdmjDwxQF8SOYYh',
            'valencia' => 'https://chat.whatsapp.com/JILwii6FuCO9wQwYeKzOek',
            'alicante' => 'https://chat.whatsapp.com/KxfSik61kniKoZcRylP1kZ',
            'girona' => 'https://chat.whatsapp.com/I7VLXtVahM1EcGLBBQkbV7',
            'lleida' => 'https://chat.whatsapp.com/BBVIknXK058FJPSdKEFE0o',
            'tarragona' => 'https://chat.whatsapp.com/KhNNDEKP716CrxYzYydkrC',
            'cataluna' => 'https://chat.whatsapp.com/JXozqgNIJYUKlDtVvoMpfO',
            'zaragoza' => 'https://chat.whatsapp.com/FG88Wc7znWHIp3gnbLSQZt',
            'huesca' => 'https://chat.whatsapp.com/DXZlyUhgvFo7DLzDmrq8JN',
            'aragon' => 'https://chat.whatsapp.com/FxCL0K60b4tBznh7XZduWA',
            'navarra' => 'https://chat.whatsapp.com/Cd9zwUsipUd5aJOyfiPEXU',
            'paisvasco' => 'https://chat.whatsapp.com/H0M6I0xHpdTDcARDcuJFxW',
            'cantabria' => 'https://chat.whatsapp.com/C4HwtO0PRm63MOlw8gZ1t1',
            'asturias' => 'https://chat.whatsapp.com/CuL2jZa6sUTBpOyqu33tYo',
            'galicia' => 'https://chat.whatsapp.com/J5MMpTsyghSAYHrxTCNr2G',
            'castillayleon' => 'https://chat.whatsapp.com/KDciOpP4IXRIAWgCj3Nc2M',
            'avila' => 'https://chat.whatsapp.com/DRKWPAMiFTt8TVc8J0wm7u',
            'valladolid' => 'https://chat.whatsapp.com/G6uY6y7PCHVI74BX0vk7Xb',
            'salamancayzamora' => 'https://chat.whatsapp.com/DYNCVy78LZw8d7010STlG8',
            'extremadura' => 'https://chat.whatsapp.com/CD1PRQFMhiMGhfMU6dZiAo',
            'badajoz' => 'https://chat.whatsapp.com/CD1PRQFMhiMGhfMU6dZiAo',
            'albacete' => 'https://chat.whatsapp.com/H2O9DmzhjGMKjb0E9pyjur',
            'ciudadreal' => 'https://chat.whatsapp.com/L3b4DutastI4khgGNOi6x3',
            'cuenca' => 'https://chat.whatsapp.com/GfhgONxjPcnGLi3gXuVImX',
            'larioja' => 'https://chat.whatsapp.com/K8uU7vu9pkW7YnOWXr7eD0',
            'grancanaria' => 'https://chat.whatsapp.com/I4vQPX4t5XqAXQWegOAxQd',
            'tenerife' => 'https://chat.whatsapp.com/B7egIm0cw1FAEzP69wbxAi',
            'mallorca' => 'https://chat.whatsapp.com/EQfXiqrnk979K41KVARLPM',
        ];

        if (isset($enlacesPorCiudad[$ciudad])) {
            return $enlacesPorCiudad[$ciudad];
        }

        // Si la ciudad no tiene un enlace de WhatsApp definido, puedes establecer un valor predeterminado o mostrar un mensaje de error.
        return 'Enlace de WhatsApp no disponible para esta ciudad.';
    }
}