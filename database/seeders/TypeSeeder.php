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
            'Ножи', 'Пистоле́ты', 'Штурмовые винтовки', 'Гладкоство́льное ору́жие', 'Снайперские винтовки'];
        $description_array = [
            'Нож (праслав. nožь, *nozi̯os — «пронзать; протыкать», родственно с греч. νύσσω — ню́ссо — «колю́») — колющий, а также рубящий, режущий инструмент, рабочей частью которого является клинок — полоса, выполненная из твёрдого материала, с лезвием, имеющим заточку на одной или нескольких сторонах.',
            'Пистоле́т (фр. pistolet ← фр. pistole от чеш. píšťala «пищаль, дудка») — ручное короткоствольное стрелковое оружие, предназначенное для поражения целей на дальности до 25-50 метров. Принцип действия автоматики пистолета основан на принципе использования отката свободного затвора.',
            'Автома́т, также штурмова́я винто́вка (англ. assault rifle) — ручное индивидуальное автоматическое огнестрельное стрелковое оружие.
Характерными особенностями автомата являются: использование промежуточного или винтовочного патрона; наличие сменного магазина большой ёмкости; относительная компактность и лёгкость (длина ствола не больше 600 мм, масса около 3-4 кг без патронов); наличие режима стрельбы очередями, рассматриваемого, как правило, в качестве основного вида ведения огня.',
            'Гладкоство́льное ору́жие — огнестрельное оружие, имеющее ствол или стволы только с гладкими каналами.
В настоящее время применяется в основном для охоты и как служебное оружие, а также для самообороны.
Ствол ружья может иметь как равные, так и различные диаметры в начале и в конце. У гладкоствольных ружей дульное сужение может быть постоянным или переменным.',
            'Снайперская винтовка — боевая винтовка, конструкция которой обеспечивает повышенную точность стрельбы.
При стрельбе ночью используются ночные прицелы или освещаются сетки оптических прицелов. Снайперские винтовки бывают неавтоматическими , магазинными и самозарядными. Как правило, высокоточные снайперские винтовки не должны быть самозарядными (полуавтоматическими): колебания от перезарядки во время выстрела снижает точность стрельбы.'
        ];
        $image_array = [
            'uploads/type/knifes.png',
            'uploads/type/pistols.png',
            'uploads/type/assaultrifle.png',
            'uploads/type/smooth.png',
            'uploads/type/sniper.png'
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
