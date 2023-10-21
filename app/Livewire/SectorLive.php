<?php



namespace App\Livewire;



use App\Models\Sector;
use App\Models\Category;


use Livewire\Component;

class SectorLive extends Component
{

    public $open = false;

    //Propiedades que se llenarán en los input en las vistas
    public $selectedSector = null/*, $description = null*/;

    //Propiedades o variables para guardar o mostrar datos
    public $name = null;

    //FUncion que se ejecutará como método o función principal el cual retorna la vista
    public function render()
    {
        return view('livewire.sector-live')->with([

           'sectores' => Sector::all(), 'categories' => Category::all(), /*'sectores' es una variable y 'Sector el modelo'. Básicamente 'sectores' obtiene los datos del
                                            modelo ('Sector') */
        ]);
    }
    /* FUnción perteneciente a los ciclos de vida de funciones el cual se ejecuta después de que una propiedad se actualiza,
                en este caso la propiedad '$selectedSector' */
    public function updatedSelectedSector($value)
    {
        //Condicional por si el valor es diferente a nulo, muestre los datos que tengan el mismo id al que se ha seleccionado
        if (!is_null($value)) {
            $this->name= Category::where('id_sector', $value)->get();
        } else {
            //Limpia la lista de sectores si no se encuentra algo.
            $this->name = null;
        }
    }

    //Función de guardado (Método store)
    public function save()
    {
        //Asignar los valores  de los campos de entrada a las propiedades
        $sctr = Sector::create
            ([
                'name' => $this->name,
                //'description' => $this->descriptionSector,
            ]);

        $category = Category::create
        ([
            'name_category'=> $sctr->name,
            'description'=> 'Esta es una categoría',
            'id_sector'=> $sctr->id
        ]);
    }

    public function delete($id)
    {
        $sctr = Sector::findOrall($id);
        $this->authorize('delete', $sctr);
        $sctr->delete();
    }


}
