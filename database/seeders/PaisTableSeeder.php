<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('paiss')->insert([
            ['id' => '1', 'name' => 'Australia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'name' => 'Austria', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'name' => 'Azerbaiyán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'name' => 'Anguilla', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'name' => 'Argentina', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'name' => 'Armenia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'name' => 'Bielorrusia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'name' => 'Belice', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '9', 'name' => 'Bélgica', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '10', 'name' => 'Bermudas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '11', 'name' => 'Bulgaria', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '12', 'name' => 'Brasil', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '13', 'name' => 'Reino Unido', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '14', 'name' => 'Hungría', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '15', 'name' => 'Vietnam', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '16', 'name' => 'Haiti', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '17', 'name' => 'Guadalupe', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '18', 'name' => 'Alemania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '19', 'name' => 'Países Bajos, Holanda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '20', 'name' => 'Grecia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '21', 'name' => 'Georgia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '22', 'name' => 'Dinamarca', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '23', 'name' => 'Egipto', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '24', 'name' => 'Israel', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '25', 'name' => 'India', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '26', 'name' => 'Irán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '27', 'name' => 'Irlanda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '28', 'name' => 'España', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '29', 'name' => 'Italia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '30', 'name' => 'Kazajstán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '31', 'name' => 'Camerún', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '32', 'name' => 'Canadá', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '33', 'name' => 'Chipre', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '34', 'name' => 'Kirguistán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '35', 'name' => 'China', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '36', 'name' => 'Costa Rica', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '37', 'name' => 'Kuwait', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '38', 'name' => 'Letonia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '39', 'name' => 'Libia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '40', 'name' => 'Lituania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '41', 'name' => 'Luxemburgo', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '42', 'name' => 'México', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '43', 'name' => 'Moldavia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '44', 'name' => 'Mónaco', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '45', 'name' => 'Nueva Zelanda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '46', 'name' => 'Noruega', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '47', 'name' => 'Polonia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '48', 'name' => 'Portugal', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '49', 'name' => 'Reunión', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '50', 'name' => 'Rusia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '51', 'name' => 'El Salvador', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '52', 'name' => 'Eslovaquia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '53', 'name' => 'Eslovenia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '54', 'name' => 'Surinam', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '55', 'name' => 'Estados Unidos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '56', 'name' => 'Tadjikistan', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '57', 'name' => 'Turkmenistan', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '58', 'name' => 'Islas Turcas y Caicos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '59', 'name' => 'Turquía', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '60', 'name' => 'Uganda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '61', 'name' => 'Uzbekistán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '62', 'name' => 'Ucrania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '63', 'name' => 'Finlandia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '64', 'name' => 'Francia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '65', 'name' => 'República Checa', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '66', 'name' => 'Suiza', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '67', 'name' => 'Suecia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '68', 'name' => 'Estonia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '69', 'name' => 'Corea del Sur', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '70', 'name' => 'Japón', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '71', 'name' => 'Croacia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '72', 'name' => 'Rumanía', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '73', 'name' => 'Hong Kong', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '74', 'name' => 'Indonesia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '75', 'name' => 'Jordania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '76', 'name' => 'Malasia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '77', 'name' => 'Singapur', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '78', 'name' => 'Taiwan', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '79', 'name' => 'Bosnia y Herzegovina', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '80', 'name' => 'Bahamas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '81', 'name' => 'Chile', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '82', 'name' => 'Colombia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '83', 'name' => 'Islandia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '84', 'name' => 'Corea del Norte', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '85', 'name' => 'Macedonia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '86', 'name' => 'Malta', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '87', 'name' => 'Pakistán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '88', 'name' => 'Papúa-Nueva Guinea', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '89', 'name' => 'Perú', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '90', 'name' => 'Filipinas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '91', 'name' => 'Arabia Saudita', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '92', 'name' => 'Tailandia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '93', 'name' => 'Emiratos árabes Unidos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '94', 'name' => 'Groenlandia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '95', 'name' => 'Venezuela', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '96', 'name' => 'Zimbabwe', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '97', 'name' => 'Kenia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '98', 'name' => 'Algeria', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '99', 'name' => 'Líbano', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '100', 'name' => 'Botsuana', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '101', 'name' => 'Tanzania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '102', 'name' => 'Namibia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '103', 'name' => 'Ecuador', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '104', 'name' => 'Marruecos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '105', 'name' => 'Ghana', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '106', 'name' => 'Siria', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '107', 'name' => 'Nepal', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '108', 'name' => 'Mauritania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '109', 'name' => 'Seychelles', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '110', 'name' => 'Paraguay', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '111', 'name' => 'Uruguay', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '112', 'name' => 'Congo (Brazzaville)', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '113', 'name' => 'Cuba', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '114', 'name' => 'Albania', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '115', 'name' => 'Nigeria', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '116', 'name' => 'Zambia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '117', 'name' => 'Mozambique', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '119', 'name' => 'Angola', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '120', 'name' => 'Sri Lanka', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '121', 'name' => 'Etiopía', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '122', 'name' => 'Túnez', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '123', 'name' => 'Bolivia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '124', 'name' => 'Panamá', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '125', 'name' => 'Malawi', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '126', 'name' => 'Liechtenstein', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '127', 'name' => 'Bahrein', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '128', 'name' => 'Barbados', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '130', 'name' => 'Chad', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '131', 'name' => 'Man, Isla de', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '132', 'name' => 'Jamaica', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '133', 'name' => 'Malí', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '134', 'name' => 'Madagascar', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '135', 'name' => 'Senegal', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '136', 'name' => 'Togo', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '137', 'name' => 'Honduras', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '138', 'name' => 'República Dominicana', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '139', 'name' => 'Mongolia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '140', 'name' => 'Irak', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '141', 'name' => 'Sudáfrica', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '142', 'name' => 'Aruba', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '143', 'name' => 'Gibraltar', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '144', 'name' => 'Afganistán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '145', 'name' => 'Andorra', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '147', 'name' => 'Antigua y Barbuda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '149', 'name' => 'Bangladesh', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '151', 'name' => 'Benín', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '152', 'name' => 'Bután', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '154', 'name' => 'Islas Virgenes Británicas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '155', 'name' => 'Brunéi', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '156', 'name' => 'Burkina Faso', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '157', 'name' => 'Burundi', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '158', 'name' => 'Camboya', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '159', 'name' => 'Cabo Verde', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '164', 'name' => 'Comores', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '165', 'name' => 'Congo (Kinshasa)', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '166', 'name' => 'Cook, Islas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '168', 'name' => 'Costa de Marfil', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '169', 'name' => 'Djibouti, Yibuti', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '171', 'name' => 'Timor Oriental', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '172', 'name' => 'Guinea Ecuatorial', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '173', 'name' => 'Eritrea', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '175', 'name' => 'Feroe, Islas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '176', 'name' => 'Fiyi', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '178', 'name' => 'Polinesia Francesa', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '180', 'name' => 'Gabón', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '181', 'name' => 'Gambia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '184', 'name' => 'Granada', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '185', 'name' => 'Guatemala', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '186', 'name' => 'Guernsey', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '187', 'name' => 'Guinea', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '188', 'name' => 'Guinea-Bissau', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '189', 'name' => 'Guyana', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '193', 'name' => 'Jersey', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '195', 'name' => 'Kiribati', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '196', 'name' => 'Laos', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '197', 'name' => 'Lesotho', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '198', 'name' => 'Liberia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '200', 'name' => 'Maldivas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '201', 'name' => 'Martinica', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '202', 'name' => 'Mauricio', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '205', 'name' => 'Myanmar', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '206', 'name' => 'Nauru', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '207', 'name' => 'Antillas Holandesas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '208', 'name' => 'Nueva Caledonia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '209', 'name' => 'Nicaragua', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '210', 'name' => 'Níger', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '212', 'name' => 'Norfolk Island', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '213', 'name' => 'Omán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '215', 'name' => 'Isla Pitcairn', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '216', 'name' => 'Qatar', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '217', 'name' => 'Ruanda', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '218', 'name' => 'Santa Elena', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '219', 'name' => 'San Cristobal y Nevis', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '220', 'name' => 'Santa Lucía', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '221', 'name' => 'San Pedro y Miquelón', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '222', 'name' => 'San Vincente y Granadinas', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '223', 'name' => 'Samoa', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '224', 'name' => 'San Marino', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '225', 'name' => 'San Tomé y Príncipe', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '226', 'name' => 'Serbia y Montenegro', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '227', 'name' => 'Sierra Leona', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '228', 'name' => 'Islas Salomón', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '229', 'name' => 'Somalia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '232', 'name' => 'Sudán', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '234', 'name' => 'Swazilandia', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '235', 'name' => 'Tokelau', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '236', 'name' => 'Tonga', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '237', 'name' => 'Trinidad y Tobago', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '239', 'name' => 'Tuvalu', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '240', 'name' => 'Vanuatu', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '241', 'name' => 'Wallis y Futuna', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '242', 'name' => 'Sáhara Occidental', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '243', 'name' => 'Yemen', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => '246', 'name' => 'Puerto Rico', 'status' => 1, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
