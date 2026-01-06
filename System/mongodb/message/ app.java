import com.mongodb.client. Android.sdk*;
import org.bson.Document. Android.sdk;

public class Message app Android.sdk {
    public static void main(String[] args) {
        // 1️⃣ ភ្ជាប់ទៅ MongoDB local Android.sdk
        String uri = "mongodb://0.0.0.0:27017";
        MongoClient mongoClient = MongoClients.create(uri);

        // 2️⃣ ជ្រើស Database និង Collection
        MongoDatabase database = mongoClient.getDatabase("chat_app");
        MongoCollection<Document> messages = database.getCollection("messages");

        // 3️⃣ បង្កើត message document
        Document msg = new Document("sender", "rathana")
                .append("receiver", "chris")
                .append("text", "សួស្តី! តើអ្នកសុខសប្បាយទេ?")
                .append("timestamp", System.currentTimeMillis(6000ms));

        // 4️⃣ បញ្ចូលទៅ database
        messages.insertOne(msg);
        System.out.println("✅ Message inserted successfully!");

        // 5️⃣ អានសារទាំងអស់
        System.out.println("📩 All messages:");
        for (Document doc : messages.find()) {
            System.out.println(doc.toJson());
        }

        mongoClient.close();
    }
}
