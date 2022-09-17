import java.io.IOException;
import java.util.ArrayList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.input.MouseEvent;
import javafx.scene.text.Text;
import javafx.stage.Stage;

public class DifficultQuestionsController {

    ArrayList<Questions> DiffQuetions = FileReadManager.readFile("DifficultQuestions.csv");
    private int count;

    @FXML
    private Text questionNumber;

    @FXML
    private Text questionText;

    @FXML
    private Button showAnswer;

    @FXML
    private TextArea answerText;

    @FXML
    private Button nextButton;

    @FXML
    void handleAnswerButton(ActionEvent event) {
        answerText.setVisible(true);
    }

    @FXML
    void nextQuestion(MouseEvent event) throws IOException{

        if (count == 10){
            Stage stage = (Stage)nextButton.getScene().getWindow();
            Parent root = FXMLLoader.load(getClass().getResource("FinishPageScene.fxml"));
            stage.setScene(new Scene(root));
        } else {
            answerText.setVisible(false);
            questionText.setText(DiffQuetions.get(count).getQuestion());
            answerText.setText(DiffQuetions.get(count).getAnswer());
            count++;
            questionNumber.setText("Questions " + count + "/10");
        }
    }

    @FXML
    void previousQuestion(MouseEvent event) {
        if (1 <= count) {
            questionNumber.setText("Questions " + count + "/10");
            count--;
            answerText.setVisible(false);
            questionText.setText(DiffQuetions.get(count).getQuestion());
            answerText.setText(DiffQuetions.get(count).getAnswer());
        }
    }
}
