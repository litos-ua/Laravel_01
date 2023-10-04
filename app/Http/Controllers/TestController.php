<?php

namespace App\Http\Controllers;
use App\Models\Picture;
use App\Models\Vacation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Google\Client;  //Ошибка при инсталляции через composer "google/apiclient": "^2.14"
//use Google\Service\Drive; //Ошибка при инсталляции через composer "google/apiclient": "^2.14"

class TestController extends Controller
{
    public int $x;
    public int $y;
    public string $environment;

    public function __construct(int $x=1, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
        $this->enviroment = App::environment();
    }

    public function testIndex(Request $request)
    {
        $selectedLanguage = $request->cookie('selectedLanguage');

        $locale = App::currentLocale();



        return view('test', ['locale' => $locale]);
    }

    public function testIndex2()
    {

        $vacationsFilenames = DB::select("SELECT * FROM vacations");

//        foreach ($vacationsFilenames as $filenames) {
//            echo 'id='.$filenames->id_cat . '&nbsp&nbsp' . $filenames->filename . '<br>' ;
//        }
//        dd($vacationsFilenames);
        return view('test', ['vacations' => $vacationsFilenames]);

    }




    public function testIndex3(){
        return view('test/test03');
    }

    public function testRegister(){
        return view('auth/register');
    }


    public function database01(){
        //$picture = Picture::first();
        $vacCat = 15;
        $pic = Picture::find(15);
        $pictures = Picture::where('category','=',$vacCat)->get();
        $picturesArr=$pictures->toArray();
        $a=1;
//        foreach ($picturesArr as $key=>$value){
//            echo $key . '=>' . $value . '<br>';
//        }

//        $vacations1 = Vacation::where('id_cat','=',12);
//        $vacations2 = Vacation::where('id_cat', '>', 11)->get();

        $vacations = Vacation::all();
        $vacationsArr = $vacations->toArray();

        //        foreach ($vacations2 as $vacation) {
//            echo "Category:" . $vacation->category ."<br>";
//            echo "Slag:" . $vacation->category ."<br>";
//        }

        //dd($vacationsArr);

//        return view('test/test03');
        //echo get_class($picture);
        //dd($pictures);
        return view('test/test02', ['pic' => $pic,
                                          'vacations' => $vacations,
                                          'pictures' => $pictures,
            ]);
    }

    /**
     * @return void
     * Rout data02
     */
    public function database02(){
//        $allVacations = Vacation::all();
        $vacationsWithPictures = Vacation::with('pictures')->get();
//        foreach ($vacationsWithPictures as $vacation){
//          echo 'ID:  ' . $vacation->id_cat . '--  CATEGORY:  ' . $vacation->category . '<br>';
//            $a=$vacation->pictures;
//            foreach ($vacation->pictures as $picture){
//                $a=1;
//                echo 'PICTURE:'. $picture->filename;
//            }
//        }
        return view('test/test02', [
            'vacationsWithPictures' => $vacationsWithPictures,
        ]);
    }

//    public function pictures(){
//        $picCollect = Vacation::hasMany(Picture::class);
//        return $picCollect;
//    }
//----------------------------------------------------------------------------------------------------------------------


    /**
     *
     */
    public function database03(){
//        $allVacations = Vacation::all();
        $vacationsWithPictures = Vacation::join('pictures', 'vacations.id_cat', '=', 'pictures.category')
            ->where('pictures.fototype', '>', 1)
            ->orderBy('vacations.id_cat')
            ->orderBy('vacations.category')
            ->orderBy('pictures.filename')
            ->orderBy('pictures.description')
            ->select('vacations.id_cat', 'vacations.category', 'pictures.filename', 'pictures.description')
            ->get();


        //$columns = $vacationsWithPictures->count() > 0 ? array_keys($vacationsWithPictures[0]->toArray()) : []; //Работает подсказал AI
        $columns = array_keys(($vacationsWithPictures->first())->toArray()); // Мой аналог предыдущего

        $jsonData = $vacationsWithPictures->toJson();
        // Convert the array to a JSON string with Unicode characters preserved
        //$jsonData = json_encode($vacationsWithPictures, JSON_UNESCAPED_UNICODE);
        return view('test/test03', [
            'vacationsWithPictures' => $vacationsWithPictures,
            'columns' => $columns,
            'jsonData' => $jsonData,
        ]);
    }

    /**
     * @param $filename
     * @return void
     * Функция для работы с подгрузкой файлов через Google drive
     * Ошибка при инсталляции через composer "google/apiclient": "^2.14" !
     */
    public function loadGoogleDriveFiles($filename){
        $directoryLink = "https://drive.google.com/drive/folders/19lNYJciPyeLAGxf6ce82Mdxwxy4VfUdp?usp=drive_link";
        $filename = "Polska_Lodz_22_003.jpg";
        // Retrieve the file ID from the directory link
        $fileId = getFileIdFromDirectoryLink($directoryLink, $filename);
        // Construct the file's direct link
        $directLink = "https://drive.google.com/uc?export=view&id=" . $fileId;

        function getFileIdFromDirectoryLink($directoryLink, $filename)
        {
            // Set up the Google API client
            $client = new Client();
            $client->setApplicationName('Your Application Name');
            $client->setScopes([Drive::DRIVE_READONLY]);
            $client->setAuthConfig('/path/to/your/credentials.json'); // Path to your Google Drive API credentials

            // Create a Drive service instance
            $driveService = new Drive($client);

            // Extract the folder ID from the directory link
            $folderId = extractFolderIdFromDirectoryLink($directoryLink);

            // Retrieve the list of files in the folder
            $files = $driveService->files->listFiles([
                'q' => "'$folderId' in parents and name = '$filename'",
                'fields' => 'files(id)',
            ]);

            // Check if the file exists in the folder
            if (!empty($files->getFiles())) {
                return $files->getFiles()[0]->getId();
            }

            return null;
        }

        function extractFolderIdFromDirectoryLink($directoryLink)
        {
            // Extract the folder ID from the directory link
            $matches = [];
            preg_match('/\/folders\/([a-zA-Z0-9_-]+)/', $directoryLink, $matches);

            return $matches[1] ?? null;
        }
}


}
