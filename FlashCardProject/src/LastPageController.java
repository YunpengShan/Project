import java.io.IOException;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;

public class LastPageController {

    @FXML
    private Button noButton;

    @FXML
    private Button yesButton;

    @FXML
    void handleNo(MouseEvent event) {
       Stage stage = (Stage) noButton.getScene().getWindow();
       stage.close();
    }

    @FXML
    void handleYes(MouseEvent event) throws IOException{
        Stage stage = (Stage)yesButton.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("FirstPageScene.fxml"));
        stage.setScene(new Scene(root));
    }

}
