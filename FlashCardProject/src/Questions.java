public class Questions {
    private String question;
    private String answer;
    
    public Questions(String question, String answer) {
        this.question = question;
        this.answer = answer;
    }
    public Questions(int parseInt) {
    }
    public String getQuestion() {
        return question;
    }
    public void setQuestion(String question) {
        this.question = question;
    }
    public String getAnswer() {
        return answer;
    }
    public void setAnswer(String answer) {
        this.answer = answer;
    }
}
