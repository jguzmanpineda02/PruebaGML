<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasFactory;
    use Notifiable;

    public function categoria()
    {

        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public static function usuariosPorPais()
    {
        $usuario = Usuario::selectRaw("pais, COUNT(pais) AS usuarios")
            ->groupBy("pais")            
            ->get();
        return $usuario;
    }
}
