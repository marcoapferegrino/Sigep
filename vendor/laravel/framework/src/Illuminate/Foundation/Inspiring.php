<?php

namespace Illuminate\Foundation;

use Illuminate\Support\Collection;

class Inspiring
{
    /**
     * Get an inspiring quote.
     *
     * Taylor & Dayle made this commit from Jungfraujoch. (11,333 ft.)
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([

            'Exígete mucho a ti mismo y espera poco de los demás. Así te ahorrarás disgustos. - confucio',
            'Todos somos muy ignorantes. Lo que ocurre es que no todos ignoramos las mismas cosas. - Einstein',
            'Nunca consideres el estudio como una obligación, sino como una oportunidad para penetrar en el bello y maravilloso mundo del saber. - Einstein',
            'Los sabios son los que buscan la sabiduría; los necios piensan ya haberla encontrado. - Napoleón I',
            'Los monos son demasiado buenos para que el hombre pueda descender de ellos. -Friedrich Nietzsche',
            'No nos atrevemos a muchas cosas porque son difíciles, pero son difíciles porque no nos atrevemos a hacerlas. - Séneca',
            'Somos todos tan limitados, que creemos siempre tener razón.. - Goethe',
            'Alguna gente no enloquece nunca. Qué vida verdaderamente horrible deben tener. - Charles Bukowski',
            'Un intelectual es el que dice una cosa simple de un modo complicado. Un artista es el que dice una cosa complicada de un modo simple. - Charles Bukowski',
            'Ese es el problema con la bebida, pensé, mientras me servía un trago. Si ocurre algo malo, bebes para olvidarlo; si ocurre algo bueno, bebes para celebrarlo; y si no pasa nada, bebes para que pase algo. - Charles Bukowski',
            'La derrota tiene algo positivo: nunca es definitiva. En cambio, la victoria tiene algo negativo: jamás es definitiva. - José Saramago',
            'Los únicos interesados en cambiar el mundo son los pesimistas, porque los optimistas están encantados con lo que hay. - José Saramago',
            'En primer lugar acabemos con Sócrates, porque ya estoy harto de este invento de que no saber nada es un signo de sabiduría. - Isaac Asimov',
            'Para tener éxito, la planificación sola es insuficiente. Uno debe improvisar también. - Isaac Asimov',





        ])->random();
    }
}
