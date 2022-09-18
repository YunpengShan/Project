
import java.util.ArrayList;

public class Hand {

    private ArrayList<Card> cards;

    public Hand() {

        cards = new ArrayList<Card>();

    }

    public Hand(ArrayList<Card> cards) {
        this.cards = cards;
    }

    public ArrayList<Card> getCards() {
        return cards;
    }

    public String showHandCards() {
        if (cards.isEmpty()) {
            return "there is no cards in hand";
        }
        String allCard="";
        for (Card card : cards) {
            allCard += (card + " ");
        }
        return allCard;
    }

    public void showIndexCards(int index) {

        if (index < 0 || index > cards.size()) {
            System.out.println("invalid index to show card");
            return;
        }
        System.out.println(cards.get(index));

    }

    public boolean exceeded21() {
        int sum = 0;
        int numOfAce = countNumOfAce();
        for (Card card : cards) {
            sum += card.getNumValue();
        }
        return ((sum - numOfAce * 10) > 21);
    }

    public int getTotalValue() {
        int totalValue = 0;
        if(countNumOfAce() == 0) {
            for (Card card : cards) {
                totalValue += card.getNumValue();
            }
            return totalValue;
        } else {
            int numOfAce = countNumOfAce();
            for (Card card : cards) {
                totalValue += card.getNumValue();
            }
            while (numOfAce != 0 && totalValue > 21){
                totalValue = totalValue - 10;
                numOfAce--;
            } 
            return totalValue;
        }
    }

    public int getAceCount() {
        if (exceeded21()) {
            return 1;
        }
        return 11;
    }

    public void drawCards(int num) {
        for (int i = 0; i < num; i++) {

            Card card = new Card(Value.randomValue(),Suit.randomSuit());
            cards.add(card);

        }
    }

    public int countNumOfAce() {
        int numOfAce = 0;
        for (int i = 0; i < cards.size(); i++) {
            if (cards.get(i).getNumValue() == 11) {
                numOfAce++;
            }
        }
        return numOfAce;
    }

    @Override
    public String toString() {
        return String.valueOf(cards);
    }
}
