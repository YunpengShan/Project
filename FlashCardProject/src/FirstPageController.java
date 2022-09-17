import java.io.IOException;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.Pane;
import javafx.stage.Stage;

public class FirstPageController {

    @FXML
    private Button difficultLevelButton;

    @FXML
    private Button easyLevelButton;

    @FXML
    private Pane flashCardPane;

    @FXML
    private Button mediumLevelButton;

    @FXML
    void handleDifficult(ActionEvent event) throws IOException {
        Stage stage = (Stage)difficultLevelButton.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("DifficultQuestionsScene.fxml"));
        stage.setScene(new Scene(root));
    }

    @FXML
    void handleEasy(ActionEvent event) throws IOException {
        Stage stage = (Stage)easyLevelButton.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("EasyQuestionsScene.fxml"));
        stage.setScene(new Scene(root));
    }

    @FXML
    void handleMedium(ActionEvent event) throws IOException {
        Stage stage = (Stage)mediumLevelButton.getScene().getWindow();
        Parent root = FXMLLoader.load(getClass().getResource("MediumQuestionsScene.fxml"));
        stage.setScene(new Scene(root));
    }

}
