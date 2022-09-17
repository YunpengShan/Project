import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

public class FileReadManager {

    public static ArrayList<Questions> readFile(String fileName){
        File file = new File(fileName);
        ArrayList<Questions> list = new ArrayList<>();
    
        try(Scanner input = new Scanner(file)){
    
            while(input.hasNextLine()){
                String[] question = input.nextLine().split("#");
                list.add(new Questions(question[0],question[1]));
            }
    
        }catch(FileNotFoundException e){
            System.out.println(e.getMessage());
        }

        return list;
    }
}

