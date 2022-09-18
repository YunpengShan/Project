
import java.util.Scanner;

public class BlackjackController {

    public static void main(String[] args) {
        System.out.println("Please Enter your name: ");
        Scanner sc = new Scanner(System.in);
        String name = sc.nextLine();
        Player player = new Player(name);
        Dealer dealer = new Dealer();
        BlackjackGame newGame = new BlackjackGame(player, dealer);
        newGame.play();
        player.hand.drawCards(2);
        dealer.hand.drawCards(2);
        System.out.print("Your cards: "+player.hand.showHandCards());
        System.out.print("\nDealer's second card: ");
        dealer.hand.showIndexCards(1);
        int drawCardOrder = 1;
        while (player.drawACardOrNot()) {
            player.hand.drawCards(1);
            dealer.hand.drawCards(1);
            drawCardOrder++;
            System.out.println("Your cards: "+player.hand.showHandCards());
            if (player.hand.exceeded21()) {
                newGame.declareWinner(dealer);
                return;
            }
        }
        if (!dealer.isOverSixteen()) {
            dealer.hand.drawCards(1);
            drawCardOrder++;
            dealer.hand.showIndexCards(drawCardOrder);
        }
        if (dealer.hand.exceeded21()) {
            newGame.declareWinner(player);
        } else {
            compareValue(player, dealer, newGame);
        }
        newGame.exit();
    }

    private static void compareValue(Player player, Dealer dealer, BlackjackGame newGame) {
        System.out.println("Your hand: "+player.hand.showHandCards()+"Value: "+player.hand.getTotalValue());
        System.out.println("Dealer's hand: "+dealer.hand.showHandCards()+"Value: "+dealer.hand.getTotalValue());
        if (player.hand.getTotalValue() > dealer.hand.getTotalValue()) {
            newGame.declareWinner(player);
        } else if (player.hand.getTotalValue() == dealer.hand.getTotalValue()) {
            newGame.declareWinner(null);
        } else {
            newGame.declareWinner(dealer);
        }
    }

}
