<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        $name_array = [
            'Ножи', 'Пистоле́ты', 'Штурмовые винтовки', 'Гладкоство́льное ору́жие', 'Снайперская винтовки'];
        $description_array = [
            'Нож (праслав. nožь, возможно от *nozi̯os — «пронзать; протыкать», родственно с греч. νύσσω — ню́ссо — «колю́») — прежде всего колющий (исходя из этимологии слова), а также рубящий, режущий инструмент, рабочей частью которого является клинок — полоса, выполненная из твёрдого материала (в большинстве случаев металл), с лезвием, имеющим заточку на одной или нескольких сторонах. В конструкции, чаще всего, можно выделить клинок и рукоять. У клинка может быть выраженное колющее остриё.',
            'Пистоле́т (фр. pistolet ← фр. pistole от чеш. píšťala «пищаль, дудка») — ручное короткоствольное стрелковое оружие, предназначенное для поражения целей (живой силы и других) на дальности до 25-50 метров.
Пистолет представляет собой самозарядное оружие, в котором подача и досылание патрона в патронник, запирание и отпирание канала ствола, извлечение из патронника и отражение гильзы осуществляется автоматически. Принцип действия автоматики пистолета основан на принципе использования отката свободного затвора.',
            'Автома́т, в иностранной литературе также штурмова́я винто́вка (англ. assault rifle) — ручное индивидуальное автоматическое огнестрельное стрелковое оружие, предназначенное для поражения живой силы противника в ближнем бою и способное создавать высокую плотность огня.

Широкое распространение автоматы получили в СССР в годы после Второй мировой войны, заменив в качестве основного оружия пехоты одновременно: пистолет-пулемёт, магазинную неавтоматическую винтовку, а также различные виды самозарядных и автоматических винтовок и карабинов предыдущего поколения.

Данный термин используется в основном в России и странах бывшего СССР. За рубежом близкое по классу оружие обычно называется автоматическими карабинами или винтовками, в зависимости от длины ствола.


Автоматы с компоновкой булл-пап короче традиционных при равной длине ствола (TAR-21)
Характерными особенностями автомата являются: использование промежуточного (в настоящее время распространены промежуточные малоимпульсные) или винтовочного патрона; наличие сменного магазина большой ёмкости; относительная компактность и лёгкость (длина ствола не больше 600 мм, масса около 3-4 кг без патронов); наличие режима стрельбы очередями, рассматриваемого, как правило, в качестве основного вида ведения огня из оружия данного типа.',
            'Гладкоство́льное ору́жие — огнестрельное оружие, имеющее ствол или стволы только с гладкими каналами.
В настоящее время применяется в основном для охоты и как служебное оружие (ружья), а также для самообороны (ружья и простейшие гладкоствольные пистолеты).

Ствол ружья может иметь как равные, так и различные диаметры в начале и в конце. Существует термин — дульное сужение. У гладкоствольных ружей оно может быть постоянным или переменным.',
            'Снайперская винтовка — боевая винтовка, конструкция которой обеспечивает повышенную точность стрельбы.
При стрельбе ночью используются ночные прицелы или освещаются сетки оптических прицелов. Снайперские винтовки бывают неавтоматическими , магазинными и самозарядными. Как правило, высокоточные снайперские винтовки не должны быть самозарядными (полуавтоматическими): колебания от перезарядки во время выстрела снижает точность стрельбы.'
        ];
        $image_array = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '30',
            '31',
            '32',
            '33'
        ];
        $array = [];
        for ($i = 0; $i < count($name_array); $i++) {
            $array[] = [
                'name' => $name_array[$i],
                'description' => $description_array[$i],
                'image' => $image_array[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('types')->insert($array);
    }

}