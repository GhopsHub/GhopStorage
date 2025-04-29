## 📘 Guía de Comandos Útilez para Trabajar con Filament en Laravel

## 🧱 Comandos de Generación

| Comando | Descripción |
| --- | --- |
| `php artisan make:filament-user` | Crea un usuario administrador para el panel Filament. |
| `php artisan make:filament-resource Nombre` | Crea un recurso CRUD completo para el panel. |
| `php artisan make:filament-page Nombre` | Crea una página personalizada dentro del panel. |
| `php artisan make:filament-widget Nombre` | Crea un widget para mostrar en dashboards. |
| `php artisan make:filament-theme` | Genera un tema visual personalizado. |
| `php artisan make:filament-notification` | (Requiere plugin) Crea una notificación personalizada. |


 ## 🧰 Comandos de Gestión y Paneles

| Comando | Descripción |
| --- | --- |
| `php artisan filament:install` | Instala archivos base y configuración de Filament. |
| `php artisan filament:assets` | Publica los assets de Filament. |
| `php artisan filament:upgrade` | Actualiza Filament a la última versión. |
| `php artisan make:filament-panel nombre` | Crea un nuevo panel (Filament v3). |
| `php artisan make:filament-user --panel=nombre` | Crea un admin para un panel específico. |
| `php artisan make:filament-resource Modelo --panel=nombre` | Crea un recurso en un panel específico. |


## 🧼 Comandos de Limpieza y Cache

| Comando | Descripción |
| --- | --- |
| `php artisan optimize:clear` | Limpia todas las caches del sistema. |
| `php artisan config:clear` | Limpia la cache de configuración. |
| `php artisan route:clear` | Limpia la cache de rutas. |
| `php artisan view:clear` | Elimina vistas compiladas. |
| `php artisan cache:clear` | Limpia la cache general de Laravel. |


## ⚙️ Comandos Laravel Útilez para Filament

| Comando | Descripción |
| --- | --- |
| `php artisan migrate` | Ejecuta migraciones de base de datos. |
| `php artisan db:seed` | Ejecuta los seeders definidos. |
| `php artisan tinker` | Consola interactiva para ejecutar código. |
| `php artisan storage:link` | Crea enlace simbólico a storage (para archivos e imágenes). |
| `php artisan serve` | Levanta el servidor local. |
| `php artisan make:policy` | Crea una policy (Filament respeta las policies de Laravel). |


## 🔐 Comandos para Roles y Permisos (Spatie Permissions)

| Comando | Descripción |
| --- | --- |
| `php artisan permission:create-role admin` | Crea un nuevo rol. |
| `php artisan permission:create-permission ver_productos` | Crea un permiso específico. |
| `php artisan cache:forget spatie.permission.cache` | Limpia la cache de permisos. |


## 🧩 Comandos de Plugins de Filament (Shield)

| Comando | Descripción |
| --- | --- |
| `php artisan shield:install` | Instala y configura el plugin Shield. |
| `php artisan shield:generate` | Genera permisos automáticos para recursos.|


## 📘 Guía de Complementos para Mejorar Filament en Laravel

Esta guía te proporciona una lista de complementos útiles para mejorar la funcionalidad de Filament.


## 🔐 Filament Shield – Roles y Permisos Avanzados
| --- | --- |
| Descripción:|
| Permite gestionar roles y permisos integrados con Spatie, facilitando el control de acceso en el panel Filament. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require bezhansalleh/filament-shield` | Este comando instala el paquete Filament Shield |
| `php artisan shield:install` | Este comando configura el paquete Filament Shield |
| `php artisan shield:generate` | Agregar políticas de control de acceso en tus recursos.|


## 🗓️ Filament FullCalendar - Calendario de Eventos
| --- | --- |
| Descripción:|
| Este complemento te permite integrar un calendario interactivo en tu panel de administración. Es ideal para gestionar eventos, reservas, citas o tareas. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require saade/filament-fullcalendar` | Instala el componente Filament FullCalendar |

*Pasos siguientes:*
| --- | --- |
| Publicar los assets de FullCalendar: |

| Comando | Descripción |
| --- | --- |
| `php artisan vendor:publish --provider="Saade\FilamentFullCalendar\FilamentFullCalendarServiceProvider"` | Publicar los componentes |


## 🔔 Filament Notifications - Notificaciones Personalizadas
| --- | --- |
| Descripción:|
| Filament Notifications te permite enviar notificaciones personalizadas a los usuarios de tu panel, ya sean toast notifications (pequeñas notificaciones flotantes) o modales. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require filament/notifications` | Comando para instalar Filament Notifications |

*Pasos siguientes:*
| --- | --- |
| Crear una notificación personalizada: |

*Ejemplo de uso:*
| --- | --- |
use Filament\Notifications\Notification;

Notification::make()
   ->title('¡Acción exitosa!')
   ->success()
   ->send();
Integrar las notificaciones donde las necesites (como en acciones de recursos o botones).


## 🗂️ Filament Spatie MediaLibrary - Gestión de Archivos y Medios
| --- | --- |
| Descripción:|
| Este complemento facilita la integración con Spatie MediaLibrary, lo que te permite subir, organizar y mostrar archivos (imágenes, documentos) dentro de tu panel de Filament. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require stefanbauer/filament-spatie-media-library` | Comando para instalar Filament Spatie MediaLibrary |

*Pasos siguientes:*
| --- | --- |
| Configurar el modelo con Spatie\MediaLibrary\HasMedia: |

*Ejemplo de uso:*
| --- | --- |
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
   use InteractsWithMedia;
}
Utilizar el campo media en tu formulario de Filament:

TextInput::make('name'),
MediaLibraryField::make('image')->collection('products')


## 📥 Maatwebsite Excel - Importar y Exportar Datos (CSV/Excel)
| --- | --- |
| Descripción:|
| Permite a los administradores importar y exportar datos de tus recursos en formatos CSV/Excel, lo que es ideal para gestionar grandes volúmenes de información. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require maatwebsite/excel` | Comando para instalar Maatwebsite Excel |

*Pasos siguientes:*
| --- | --- |
| Crear una exportación para un recurso: |

*Ejemplo de uso:*
| --- | --- |
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
   public function collection()
   {
       return Product::all();
   }
}
Enlazar la exportación en tu recurso Filament:

public function export(): void
{
   return Excel::download(new ProductsExport, 'productos.xlsx');
}


## 🔃 Livewire Sortable - Ordenar Elementos Drag-and-Drop
| --- | --- |
| Descripción:|
| Permite agregar funcionalidad drag-and-drop para ordenar elementos en las tablas o en las vistas de tu panel Filament. Muy útil para recursos como listas de productos o artículos. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require livewire/sortable` |  Comando para instalar Livewire Sortable |

*Pasos siguientes:*
| --- | --- |
| Usar LivewireSortable en tu componente de Filament: |

*Ejemplo de uso:*
| --- | --- |
use Livewire\WithSortable;

class ProductList extends Component
{
   use WithSortable;

   public function render()
   {
       return view('livewire.product-list', [
           'products' => Product::sortable()->get(),
       ]);
   }
}


## 🖼️ Intervention Image - Redimensionar y Manipular Imágenes
| --- | --- |
| Descripción:|
| Este paquete te permite redimensionar, recortar y manipular imágenes antes de guardarlas en la base de datos o almacenarlas. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require intervention/image` |  Comando para instalar Intervention Image |

*Pasos siguientes:*
| --- | --- |
| Usar Intervention\Image\Facades\Image para manipular imágenes: |

*Ejemplo de uso:*
| --- | --- |
use Intervention\Image\Facades\Image;

$image = Image::make($request->file('image'));
$image->resize(300, 200);
$image->save(public_path('images/product_image.jpg'));


## 🛡️ Spatie Laravel Permission - Roles y Permisos de Usuario
| --- | --- |
| Descripción:|
| Spatie Laravel Permission es la librería ideal para implementar roles y permisos a nivel de usuarios, ideal para personalizar la seguridad de tu panel. |

**Instalación:**

| Comando | Descripción |
| --- | --- |
| `composer require spatie/laravel-permission` |  Comando para instalar Spatie |

*Pasos siguientes:*
| --- | --- |
| Publicar las migraciones: |

| Comando | Descripción |
| --- | --- |
| `composer require spatie/laravel-permission` |  Comando para instalar Spatie |
| `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"` | Publicar archivos |
| `php artisan migrate` | Correr migraciones |

*Ejemplo de uso:*
| --- | --- |
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'Admin']);
$permission = Permission::create(['name' => 'edit products']);

$role->givePermissionTo($permission);

//////////////////////////////////////
leandrocfe/filament-apex-charts

instalacion 
composer require leandrocfe/filament-apex-charts










//////////////////////////////////////
ORGANIZACION DE FORMS


Forms\Components\Fieldset::make('Horario')
    ->schema([
        Forms\Components\TimePicker::make('hora_inicio')->required(),
        Forms\Components\TimePicker::make('hora_fin')->required(),
    ])


 public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // -----------------
                // Organización con Grid
                // -----------------
                Forms\Components\Grid::make(1) // 1 columna
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TimePicker::make('hora_inicio')
                            ->required(),
                        Forms\Components\TimePicker::make('hora_fin')
                            ->required(),
                        Forms\Components\Toggle::make('estado')
                            ->label('Activo')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ]),

                // -----------------
                // Organización con Fieldset
                // -----------------
                Forms\Components\Fieldset::make('Datos del Horario')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TimePicker::make('hora_inicio')
                            ->required(),
                        Forms\Components\TimePicker::make('hora_fin')
                            ->required(),
                        Forms\Components\Toggle::make('estado')
                            ->label('Activo')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ]),

                // -----------------
                // Organización con Tabs
                // -----------------
                Forms\Components\Tabs::make('Formulario')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Datos Generales')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                            ]),
                        Forms\Components\Tabs\Tab::make('Horario')
                            ->schema([
                                Forms\Components\TimePicker::make('hora_inicio')
                                    ->required(),
                                Forms\Components\TimePicker::make('hora_fin')
                                    ->required(),
                                Forms\Components\Toggle::make('estado')
                                    ->label('Activo')
                                    ->default(true)
                                    ->onColor('success')
                                    ->offColor('danger'),
                            ]),
                    ]),

                // -----------------
                // Organización con Section
                // -----------------
                Forms\Components\Section::make('Información de Horario')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TimePicker::make('hora_inicio')
                            ->required(),
                        Forms\Components\TimePicker::make('hora_fin')
                            ->required(),
                        Forms\Components\Toggle::make('estado')
                            ->label('Activo')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),
                    ])
                    ->collapsible() // opcional: que sea plegable
                    ->collapsed(),   // empieza cerrado
            ]);
    }
