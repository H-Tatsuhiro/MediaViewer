extern crate image;

fn path_read() -> String {
    let mut args = std::env::args();
    args.next();
    let path = match args.next() {
        None => {
            println!("Not Found");
            return String::from("null")
        },
        Some(s) => s,
    };

    return path;
}

pub fn img_save() {
    let args: Vec<String> = std::env::args().collect();
    let path = &args[1];
    let img = image::open(&path).unwrap();
    let path_save = &args[2];
    img.save(&path_save).unwrap();
}